<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create();
        $transactions = $wallet->getRecentTransactions(20);

        return view('wallet.index', compact('wallet', 'transactions'));
    }

    public function deposit()
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create();
        return view('wallet.deposit', compact('wallet'));
    }

    public function storeDeposit(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            /** @var User $user */
            $user = Auth::user();
            $wallet = $user->wallet ?? $user->wallet()->create();
            $wallet->deposit(
                $validated['amount'],
                $validated['description'] ?? 'Deposit',
                'DEP-' . now()->timestamp
            );

            return redirect()->route('wallet.index')->with('success', 'Deposit successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function withdraw()
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->withdrawal_address) {
            return redirect()->route('settings.index')->with('error', 'Please set a withdrawal address in settings before making a withdrawal.');
        }

        $wallet = $user->wallet ?? $user->wallet()->create();
        return view('wallet.withdraw', compact('wallet'));
    }

    public function storeWithdraw(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->withdrawal_address) {
            return redirect()->route('settings.index')->with('error', 'Please set a withdrawal address in settings before making a withdrawal.');
        }

        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $wallet = $user->wallet ?? $user->wallet()->create();
            $wallet->withdraw(
                $validated['amount'],
                $validated['description'] ?? 'Withdrawal',
                'WD-' . now()->timestamp
            );

            return redirect()->route('wallet.index')->with('success', 'Withdrawal successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function transactions()
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create();
        $transactions = $wallet->transactions()->latest()->paginate(20);

        return view('wallet.transactions', compact('transactions'));
    }
}
