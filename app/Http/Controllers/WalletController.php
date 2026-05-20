<?php

namespace App\Http\Controllers;

use App\Models\PendingDeposit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    private function supportedCryptos(): array
    {
        return [
            'BTC' => [
                'label' => 'Bitcoin (BTC)',
                'network' => 'Bitcoin Mainnet',
                'address' => 'bc1q8v6myu4mm3s0dt3w86jr8n4m6n8z4n0u34xj2p',
                'confirmations' => 2,
            ],
            'ETH' => [
                'label' => 'Ethereum (ETH)',
                'network' => 'Ethereum (ERC-20)',
                'address' => '0x4A2f8F0AFD4dA5A5BC7B4D7EE38f5C43F6Bf4d97',
                'confirmations' => 12,
            ],
            'USDC' => [
                'label' => 'USD Coin (USDC)',
                'network' => 'Ethereum (ERC-20)',
                'address' => '0x4A2f8F0AFD4dA5A5BC7B4D7EE38f5C43F6Bf4d97',
                'confirmations' => 12,
            ],
            'USDT' => [
                'label' => 'Tether (USDT)',
                'network' => 'TRON (TRC-20)',
                'address' => 'TP1Z4NEFs7GcQxQf8xL1f4w5y6p9tA7uB3',
                'confirmations' => 20,
            ],
            'SOL' => [
                'label' => 'Solana (SOL)',
                'network' => 'Solana',
                'address' => '9vY8fM5k4mRQGxJ8Yxw3h3G9JQkQzS6z3s4p8Xw3nR1d',
                'confirmations' => 32,
            ],
        ];
    }

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
        $currencies = $this->supportedCryptos();

        return view('wallet.deposit', compact('wallet', 'currencies'));
    }

    public function storeDeposit(Request $request)
    {
        $supportedCryptos = $this->supportedCryptos();
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'currency' => ['required', 'string', 'in:' . implode(',', array_keys($supportedCryptos))],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $expiresAt = now()->addMinutes(30);
        $request->session()->put('pending_deposit', [
            'amount' => (float) $validated['amount'],
            'currency' => $validated['currency'],
            'description' => $validated['description'] ?? 'Deposit',
            'expires_at' => $expiresAt->toIso8601String(),
        ]);

        return redirect()->route('wallet.deposit.instructions');
    }

    public function depositInstructions(Request $request)
    {
        $pendingDeposit = $request->session()->get('pending_deposit');

        if (!$pendingDeposit) {
            return redirect()->route('wallet.deposit')->with('error', 'Start a new deposit to view payment details.');
        }

        $expiresAt = Carbon::parse($pendingDeposit['expires_at']);
        if ($expiresAt->isPast()) {
            $request->session()->forget('pending_deposit');
            return redirect()->route('wallet.deposit')->with('error', 'Deposit request expired. Please create a new one.');
        }

        $supportedCryptos = $this->supportedCryptos();
        $selectedCrypto = $supportedCryptos[$pendingDeposit['currency']] ?? null;
        if (!$selectedCrypto) {
            $request->session()->forget('pending_deposit');
            return redirect()->route('wallet.deposit')->with('error', 'Invalid currency selected. Please try again.');
        }

        return view('wallet.deposit-instructions', [
            'pendingDeposit' => $pendingDeposit,
            'selectedCrypto' => $selectedCrypto,
            'expiresAt' => $expiresAt,
        ]);
    }

    public function completeDeposit(Request $request)
    {
        $pendingDeposit = $request->session()->get('pending_deposit');
        if (!$pendingDeposit) {
            return redirect()->route('wallet.deposit')->with('error', 'No active deposit found. Start a new deposit.');
        }

        $expiresAt = Carbon::parse($pendingDeposit['expires_at']);
        if ($expiresAt->isPast()) {
            $request->session()->forget('pending_deposit');
            return redirect()->route('wallet.deposit')->with('error', 'Deposit window expired. Start a new request.');
        }

        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create();
        $reference = 'DEP-' . now()->timestamp . '-' . Str::upper(Str::random(6));

        PendingDeposit::create([
            'user_id' => $user->id,
            'wallet_id' => $wallet->id,
            'amount' => $pendingDeposit['amount'],
            'currency' => $pendingDeposit['currency'],
            'description' => ($pendingDeposit['description'] ?? 'Deposit') . ' [' . $pendingDeposit['currency'] . ']',
            'reference' => $reference,
            'status' => 'pending',
            'expires_at' => $expiresAt,
        ]);

        $request->session()->forget('pending_deposit');

        return redirect()->route('wallet.deposit.confirmation', ['reference' => $reference]);
    }

    public function depositConfirmation(Request $request)
    {
        $reference = $request->query('reference');
        if (!$reference) {
            return redirect()->route('wallet.deposit');
        }

        $deposit = PendingDeposit::where('reference', $reference)
            ->where('user_id', Auth::id())
            ->first();

        if (!$deposit) {
            return redirect()->route('wallet.deposit')->with('error', 'Deposit request not found.');
        }

        return view('wallet.deposit-confirmation', compact('deposit'));
    }

    public function withdraw()
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create();
        return view('wallet.withdraw', compact('wallet'));
    }

    public function storeWithdraw(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user->withdrawal_address) {
            return redirect()->route('wallet.withdraw')->with('error', 'Please set a withdrawal address in settings before making a withdrawal.');
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
