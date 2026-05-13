<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions | The Real World Wallet</title>
    <meta name="description" content="View your wallet transaction history.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; background: #02040E; color: white; line-height: 1.5; }
        main { width: 100%; min-height: 100vh; padding: 2rem 1rem; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 2rem; }
        .logo { max-width: 80px; height: auto; margin: 0 auto 1rem; }
        .header h1 { font-size: 3.75rem; font-weight: bold; text-transform: uppercase; margin-bottom: 1rem; }
        @media (max-width: 768px) { .header h1 { font-size: 2.25rem; } }
        .header p { font-size: 1.25rem; color: rgba(255,255,255,0.7); }
        .card { background: rgba(8, 12, 24, 0.85); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 2rem; }
        .card h2 { font-size: 1.5rem; margin-bottom: 1rem; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem; justify-content: center; }
        .nav-link { padding: 0.85rem 1.25rem; border-radius: 0.85rem; text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: white; text-decoration: none; background: rgba(255,255,255,0.08); transition: transform 0.2s ease, background 0.2s ease; }
        .nav-link:hover { transform: translateY(-2px); background: rgba(255,255,255,0.14); }
        .transaction-table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        .transaction-table th, .transaction-table td { padding: 1rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .transaction-table th { color: rgba(255,255,255,0.65); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.08em; text-align: left; }
        .transaction-table td { color: rgba(255,255,255,0.9); font-size: 0.95rem; }
        .transaction-row:last-child td { border-bottom: none; }
        .type-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 100px; padding: 0.5rem 0.75rem; border-radius: 999px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; }
        .deposit { background: rgba(52, 211, 153, 0.18); color: #34d399; }
        .withdrawal { background: rgba(248, 113, 113, 0.18); color: #f87171; }
        .empty-state { text-align: center; padding: 2rem 1rem; color: rgba(255,255,255,0.7); }
        .pagination { display: flex; justify-content: center; gap: 0.75rem; margin-top: 1.75rem; }
        .pagination a, .pagination span { padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid rgba(255,255,255,0.08); color: white; text-decoration: none; background: rgba(255,255,255,0.05); }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="header">
                <img src="{{ asset('images/logo.webp') }}" alt="The Real World Logo" class="logo" />
                <h1>Transaction History</h1>
                <p>All wallet transactions are recorded here, with crypto deposits and withdrawals.</p>
            </div>

            <div class="nav-links">
                <a href="{{ route('wallet.index') }}" class="nav-link">Wallet</a>
                <a href="{{ route('wallet.deposit') }}" class="nav-link">Deposit</a>
            </div>

            <div class="card">
                <h2>Transactions</h2>
                @if($transactions->count())
                    <table class="transaction-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Balance After</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr class="transaction-row">
                                    <td>{{ $transaction->created_at->format('M j, Y h:ia') }}</td>
                                    <td>
                                        <span class="type-badge {{ $transaction->type }}">{{ $transaction->type }}</span>
                                    </td>
                                    <td class="{{ $transaction->type === 'deposit' ? 'deposit' : 'withdrawal' }}">{{ $transaction->type === 'deposit' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}</td>
                                    <td>${{ number_format($transaction->balance_after, 2) }}</td>
                                    <td>{{ $transaction->description ?? 'Crypto transaction' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $transactions->links('pagination::simple-default') }}
                    </div>
                @else
                    <div class="empty-state">No transactions found yet. Make a crypto deposit to start tracking wallet activity.</div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
