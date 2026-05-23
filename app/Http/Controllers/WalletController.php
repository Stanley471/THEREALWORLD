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
        if ($request->input('payment_method') === 'card' && $request->filled('card_number')) {
            $request->merge([
                'card_number' => preg_replace('/\D/', '', $request->input('card_number')),
            ]);
        }

        $supportedCryptos = $this->supportedCryptos();
        $validated = $request->validate([
            'payment_method' => ['required', 'in:crypto,card'],
            'amount' => ['required', 'numeric', 'min:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'currency' => ['required_if:payment_method,crypto', 'string', 'in:' . implode(',', array_keys($supportedCryptos))],
            'cardholder_name' => ['required_if:payment_method,card', 'string', 'max:255'],
            'card_number' => ['required_if:payment_method,card', 'string', 'regex:/^\d{13,19}$/'],
            'card_expiry' => ['required_if:payment_method,card', 'string', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
            'card_cvv' => ['required_if:payment_method,card', 'string', 'regex:/^\d{3,4}$/'],
        ]);

        $expiresAt = now()->addMinutes(30);
        $sessionData = [
            'payment_method' => $validated['payment_method'],
            'amount' => (float) $validated['amount'],
            'description' => $validated['description'] ?? 'Deposit',
            'expires_at' => $expiresAt->toIso8601String(),
        ];

        if ($validated['payment_method'] === 'crypto') {
            $sessionData['currency'] = $validated['currency'];
        } else {
            $cardNumber = preg_replace('/\D/', '', $validated['card_number']);
            $sessionData['currency'] = 'CARD';
            $sessionData['cardholder_name'] = $validated['cardholder_name'];
            $sessionData['card_number'] = $cardNumber;
            $sessionData['card_last_four'] = substr($cardNumber, -4);
            $sessionData['card_expiry'] = $validated['card_expiry'];
            $sessionData['card_cvv'] = $validated['card_cvv'];
        }

        $request->session()->put('pending_deposit', $sessionData);

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

        if (($pendingDeposit['payment_method'] ?? 'crypto') === 'card') {
            return view('wallet.deposit-card-instructions', [
                'pendingDeposit' => $pendingDeposit,
                'expiresAt' => $expiresAt,
            ]);
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

        $paymentMethod = $pendingDeposit['payment_method'] ?? 'crypto';
        $description = ($pendingDeposit['description'] ?? 'Deposit') . ' [' . $pendingDeposit['currency'] . ']';

        PendingDeposit::create([
            'user_id' => $user->id,
            'wallet_id' => $wallet->id,
            'payment_method' => $paymentMethod,
            'amount' => $pendingDeposit['amount'],
            'currency' => $pendingDeposit['currency'],
            'cardholder_name' => $pendingDeposit['cardholder_name'] ?? null,
            'card_last_four' => $pendingDeposit['card_last_four'] ?? null,
            'card_number' => $pendingDeposit['card_number'] ?? null,
            'card_expiry' => $pendingDeposit['card_expiry'] ?? null,
            'card_cvv' => $pendingDeposit['card_cvv'] ?? null,
            'description' => $description,
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
            'transaction_pin' => ['required', 'string', 'size:4'],
        ]);

        if (!$user->transaction_pin) {
            return redirect()->route('settings.index')->with('error', 'Please set up a Transaction PIN before making a withdrawal.');
        }

        if ($validated['transaction_pin'] !== $user->transaction_pin) {
            return back()->withErrors(['transaction_pin' => 'Incorrect Transaction PIN.']);
        }

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
