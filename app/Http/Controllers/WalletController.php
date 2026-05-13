<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $wallet = Auth::user()->wallet;
        $transactions = $wallet->getRecentTransactions(20);

        return view('wallet.index', compact('wallet', 'transactions'));
    }

    public function deposit()
    {
        return view('wallet.deposit');
    }

    public function storeDeposit(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $wallet = Auth::user()->wallet;
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
        $wallet = Auth::user()->wallet;
        return view('wallet.withdraw', compact('wallet'));
    }

    public function storeWithdraw(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $wallet = Auth::user()->wallet;
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
        $wallet = Auth::user()->wallet;
        $transactions = $wallet->transactions()->latest()->paginate(20);

        return view('wallet.transactions', compact('transactions'));
    }
}
