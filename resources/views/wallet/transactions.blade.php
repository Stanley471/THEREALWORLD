<x-dashboard-layout title="Transactions">
    <style>
        .container { max-width: 1200px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2rem; }
        .page-header h1 { font-size: 2.75rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem; }
        .nav-link { padding: 0.85rem 1.25rem; border-radius: 0.85rem; text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: white; text-decoration: none; background: rgba(255,255,255,0.08); transition: transform 0.2s ease, background 0.2s ease; }
        .nav-link:hover { transform: translateY(-2px); background: rgba(255,255,255,0.14); }
        .card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 2rem; }
        .card h2 { font-size: 1.5rem; margin-bottom: 1rem; }
        .transaction-table { width: 100%; border-collapse: collapse; }
        .transaction-table th, .transaction-table td { padding: 1rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .transaction-table th { color: rgba(226,232,240,0.7); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.08em; text-align: left; }
        .transaction-table td { color: rgba(226,232,240,0.9); font-size: 0.95rem; }
        .type-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 100px; padding: 0.5rem 0.75rem; border-radius: 999px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; }
        .deposit { background: rgba(52, 211, 153, 0.18); color: #34d399; }
        .withdrawal { background: rgba(248, 113, 113, 0.18); color: #f87171; }
        .returns-positive { background: rgba(52, 211, 153, 0.18); color: #34d399; }
        .returns-negative { background: rgba(248, 113, 113, 0.18); color: #f87171; }
        .adjustment-positive { background: rgba(96, 165, 250, 0.18); color: #60a5fa; }
        .adjustment-negative { background: rgba(248, 113, 113, 0.18); color: #f87171; }
        .empty-state { text-align: center; padding: 2rem 1rem; color: rgba(226,232,240,0.7); }
        .pagination { display: flex; justify-content: center; gap: 0.75rem; margin-top: 1.75rem; }
        .pagination a, .pagination span { padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid rgba(255,255,255,0.08); color: white; text-decoration: none; background: rgba(255,255,255,0.05); }
    </style>

    <div class="container">
        <div class="page-header">
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
                            @php
                                $isCredit = $transaction->type === 'deposit' || ($transaction->type === 'returns' && $transaction->amount >= 0) || ($transaction->type === 'adjustment' && $transaction->amount >= 0);
                                $amountSign = $transaction->type === 'withdrawal' || ($transaction->amount < 0) ? '-' : '+';
                                $amountClass = $transaction->type === 'withdrawal' ? 'withdrawal' : 'deposit';
                                $typeClass = match ($transaction->type) {
                                    'deposit' => 'deposit',
                                    'withdrawal' => 'withdrawal',
                                    'returns' => $transaction->amount >= 0 ? 'returns-positive' : 'returns-negative',
                                    'adjustment' => $transaction->amount >= 0 ? 'adjustment-positive' : 'adjustment-negative',
                                    default => $transaction->type,
                                };
                            @endphp
                            <tr>
                                <td>{{ $transaction->created_at->format('M j, Y h:ia') }}</td>
                                <td><span class="type-badge {{ $typeClass }}">{{ $transaction->type }}</span></td>
                                <td class="{{ $amountClass }}">{{ $amountSign }}${{ number_format(abs($transaction->amount), 2) }}</td>
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
</x-dashboard-layout>
