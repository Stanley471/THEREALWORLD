<x-dashboard-layout title="Wallet">
    <style>
        .container { max-width: 1200px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2.5rem; }
        .page-header h1 { font-size: 2.75rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }
        .stats-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        @media (max-width: 768px) { .stats-grid { grid-template-columns: 1fr; } }
        .stat-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; }
        .stat-card h2 { font-size: 0.95rem; letter-spacing: 0.15em; text-transform: uppercase; color: #94a3b8; margin-bottom: 1rem; }
        .stat-card p { font-size: 3rem; font-weight: 800; margin-bottom: 1rem; }
        .button-row { display: flex; flex-wrap: wrap; gap: 1rem; }
        .action-button { border-radius: 0.85rem; padding: 1rem 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 0.5rem; transition: transform 0.2s ease, background 0.2s ease; }
        .action-button.crypto { background: #FF8D3A; color: #050d19; }
        .action-button.withdraw { background: rgba(255,255,255,0.08); color: #fff; }
        .action-button.history { background: rgba(255,255,255,0.05); color: #fff; }
        .action-button:hover { transform: translateY(-2px); }
        .transactions-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; }
        .transactions-card h3 { font-size: 1.2rem; margin-bottom: 1rem; }
        .transaction-list { width: 100%; border-collapse: collapse; }
        .transaction-list th, .transaction-list td { text-align: left; padding: 0.95rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .transaction-list th { color: rgba(226,232,240,0.72); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.08em; }
        .transaction-list td { color: rgba(226,232,240,0.9); font-size: 0.95rem; }
        .transaction-type { font-weight: 700; text-transform: capitalize; }
        .amount-up { color: #34d399; }
        .amount-down { color: #f87171; }
        .empty-state { text-align: center; padding: 2rem 1rem; color: rgba(226,232,240,0.72); }
        .footer-text { text-align: center; color: rgba(226,232,240,0.6); margin-top: 2rem; font-size: 0.95rem; }
    </style>

    <div class="container">
        <div class="page-header">
            <h1>Wallet Dashboard</h1>
            <p>Track your balance and recent crypto transactions from within the same dashboard layout.</p>
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
                <div class="action-button history">Latest activity</div>
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

        <div class="footer-text">Your wallet balance updates automatically when transactions are recorded.</div>
    </div>
</x-dashboard-layout>
