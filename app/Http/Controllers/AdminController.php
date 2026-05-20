<?php

namespace App\Http\Controllers;

use App\Models\PendingDeposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers      = User::count();
        $newUsersToday   = User::whereDate('created_at', today())->count();
        $newUsersWeek    = User::where('created_at', '>=', now()->subDays(7))->count();
        $verifiedUsers   = User::whereNotNull('email_verified_at')->count();

        // Recent registrations
        $recentUsers = User::latest()->take(8)->get();

        // User growth by day (last 7 days)
        $userGrowth = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        return view('admin.dashboard', compact(
            'totalUsers', 'newUsersToday', 'newUsersWeek',
            'verifiedUsers', 'recentUsers', 'userGrowth'
        ));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function editUser(User $user)
    {
        $wallet = $user->wallet;
        return view('admin.users.edit', compact('user', 'wallet'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'withdrawal_address' => ['nullable', 'string', 'max:255'],
            'daily_return_min' => ['nullable', 'numeric', 'between:-100,100', 'required_with:daily_return_max'],
            'daily_return_max' => ['nullable', 'numeric', 'between:-100,100', 'required_with:daily_return_min', 'gte:daily_return_min'],
            'wallet_balance' => ['nullable', 'numeric', 'min:0'],
        ]);

        $dailyReturnMin = isset($validated['daily_return_min']) ? round($validated['daily_return_min'], 2) : null;
        $dailyReturnMax = isset($validated['daily_return_max']) ? round($validated['daily_return_max'], 2) : null;
        $dailyReturnValue = $user->daily_return;

        if (!is_null($dailyReturnMin) && !is_null($dailyReturnMax)) {
            $minCents = (int) round($dailyReturnMin * 100);
            $maxCents = (int) round($dailyReturnMax * 100);
            $dailyReturnValue = round(mt_rand($minCents, $maxCents) / 100, 2);
        }

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'withdrawal_address' => $validated['withdrawal_address'],
            'daily_return_min' => $dailyReturnMin,
            'daily_return_max' => $dailyReturnMax,
            'daily_return' => $dailyReturnValue,
        ]);

        // Update wallet balance if provided
        if (!empty($validated['wallet_balance']) && $user->wallet) {
            $oldBalance = $user->wallet->balance;
            $newBalance = $validated['wallet_balance'];
            $user->wallet->update(['balance' => $newBalance]);

            // Log adjustment transaction
            $adjustmentAmount = abs($newBalance - $oldBalance);
            $user->wallet->transactions()->create([
                'type' => 'adjustment',
                'amount' => $adjustmentAmount,
                'balance_after' => $newBalance,
                'description' => 'Admin balance adjustment',
                'reference' => 'admin_adjustment',
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function deposits(Request $request)
    {
        $status = $request->query('status', 'pending');
        $allowedStatuses = ['pending', 'approved', 'declined', 'all'];

        if (!in_array($status, $allowedStatuses, true)) {
            $status = 'pending';
        }

        $query = PendingDeposit::with(['user', 'wallet', 'reviewer'])
            ->latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $deposits = $query->paginate(15)->withQueryString();

        $counts = [
            'pending' => PendingDeposit::where('status', 'pending')->count(),
            'approved' => PendingDeposit::where('status', 'approved')->count(),
            'declined' => PendingDeposit::where('status', 'declined')->count(),
        ];

        return view('admin.deposits', compact('deposits', 'status', 'counts'));
    }

    public function approveDeposit(PendingDeposit $pendingDeposit)
    {
        if (!$pendingDeposit->isPending()) {
            return back()->with('error', 'This deposit has already been reviewed.');
        }

        DB::transaction(function () use ($pendingDeposit) {
            $wallet = $pendingDeposit->wallet;
            $transaction = $wallet->deposit(
                $pendingDeposit->amount,
                $pendingDeposit->description,
                $pendingDeposit->reference
            );

            $pendingDeposit->update([
                'status' => 'approved',
                'reviewed_by' => Auth::id(),
                'reviewed_at' => now(),
                'transaction_id' => $transaction->id,
            ]);
        });

        return back()->with('success', 'Deposit approved and wallet credited.');
    }

    public function declineDeposit(Request $request, PendingDeposit $pendingDeposit)
    {
        if (!$pendingDeposit->isPending()) {
            return back()->with('error', 'This deposit has already been reviewed.');
        }

        $validated = $request->validate([
            'admin_note' => ['nullable', 'string', 'max:500'],
        ]);

        $pendingDeposit->update([
            'status' => 'declined',
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
            'admin_note' => $validated['admin_note'] ?? null,
        ]);

        return back()->with('success', 'Deposit declined.');
    }
}
