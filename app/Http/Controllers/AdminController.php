<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'wallet_balance' => ['nullable', 'numeric', 'min:0'],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'withdrawal_address' => $validated['withdrawal_address'],
        ]);

        // Update wallet balance if provided
        if (!empty($validated['wallet_balance']) && $user->wallet) {
            $user->wallet->update(['balance' => $validated['wallet_balance']]);
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
}
