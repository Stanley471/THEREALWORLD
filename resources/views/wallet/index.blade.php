<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wallet Dashboard | The Real World</title>
    <meta name="description" content="View your wallet balance and recent crypto transactions.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; background: #02040E; color: white; line-height: 1.5; }
        main { width: 100%; min-height: 100vh; padding: 2rem 1rem; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 2.5rem; }
        .logo { max-width: 80px; height: auto; margin: 0 auto 1rem; }
        .header h1 { font-size: 3.75rem; font-weight: bold; text-transform: uppercase; margin-bottom: 1rem; }
        @media (max-width: 768px) { .header h1 { font-size: 2.25rem; } }
        .header p { font-size: 1.25rem; color: rgba(255,255,255,0.7); }
        .stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 2rem; }
        @media (max-width: 768px) { .stats-grid { grid-template-columns: 1fr; } }
        .stat-card { background: rgba(8, 12, 24, 0.85); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 1.75rem; }
        .stat-card h2 { font-size: 1rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.65); margin-bottom: 0.75rem; }
        .stat-card p { font-size: 3rem; font-weight: 800; margin-bottom: 0.75rem; }
        .button-row { display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1rem; }
        .action-button { border: 1px solid transparent; border-radius: 0.85rem; padding: 1rem 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; transition: transform 0.2s ease, background 0.2s ease; display: inline-flex; align-items: center; gap: 0.5rem; }
        .action-button.crypto { background: #FF8D3A; color: #050d19; }
        .action-button.withdraw { background: #1F2937; color: #fff; border: 1px solid rgba(255,255,255,0.08); }
        .action-button.history { background: rgba(255,255,255,0.08); color: #fff; }
        .action-button:hover { transform: translateY(-2px); }
        .transactions-card { background: rgba(8, 12, 24, 0.85); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 1.75rem; }
        .transactions-card h3 { font-size: 1.125rem; margin-bottom: 1rem; }
        .transaction-list { width: 100%; border-collapse: collapse; }
        .transaction-list th, .transaction-list td { text-align: left; padding: 0.85rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .transaction-list th { color: rgba(255,255,255,0.7); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.08em; }
        .transaction-list td { font-size: 0.95rem; color: rgba(255,255,255,0.9); }
        .transaction-type { font-weight: 700; text-transform: capitalize; }
        .amount-up { color: #34d399; }
        .amount-down { color: #f87171; }
        .empty-state { text-align: center; padding: 2rem 1rem; color: rgba(255,255,255,0.7); }
        .footer-text { text-align: center; color: rgba(255,255,255,0.6); margin-top: 2rem; font-size: 0.95rem; }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="header">
                <img src="{{ asset('images/logo.webp') }}" alt="The Real World Logo" class="logo" />
                <h1>Wallet Dashboard</h1>
                <p>Track your balance and most recent crypto deposits immediately.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h2>Current Balance</h2>
                    <p>${{ number_format($wallet->balance, 2) }}</p>
                    <div class="button-row">
                        <a href="{{ route('wallet.deposit') }}" class="action-button crypto">Deposit Crypto</a>
                        <a href="{{ route('wallet.withdraw') }}" class="action-button withdraw">Withdraw</a>
                        <a href="{{ route('wallet.transactions') }}" class="action-button history">View History</a>
                    </div>
                </div>
                <div class="stat-card">
                    <h2>Wallet Summary</h2>
                    <p>{{ $transactions->count() }} latest transactions</p>
                    <div class="action-button history" style="width: fit-content;">Latest activity</div>
                </div>
            </div>

            <div class="transactions-card">
                <h3>Recent Transactions</h3>
                @if($transactions->isNotEmpty())
                    <table class="transaction-list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at->format('M j, Y') }}</td>
                                    <td class="transaction-type">{{ $transaction->type }}</td>
                                    <td class="{{ $transaction->type === 'deposit' ? 'amount-up' : 'amount-down' }}">
                                        {{ $transaction->type === 'deposit' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td>${{ number_format($transaction->balance_after, 2) }}</td>
                                    <td>{{ $transaction->description ?? 'Crypto deposit' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">No recent transactions yet. Make a crypto deposit to start funding your wallet.</div>
                @endif
            </div>

            <div class="footer-text">Your wallet balance will update as soon as crypto deposits are confirmed.</div>
        </div>
    </main>
</body>
</html>
