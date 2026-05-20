<x-dashboard-layout title="Portfolio">
    <style>
        .portfolio-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        @media (max-width: 980px) { .portfolio-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 700px) { .portfolio-grid { grid-template-columns: 1fr; } }
        .portfolio-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; }
        .portfolio-card h3 { font-size: 0.95rem; letter-spacing: 0.14em; text-transform: uppercase; color: #94a3b8; margin-bottom: 1rem; }
        .portfolio-card .value { font-size: 2.75rem; font-weight: 800; margin-bottom: 0.75rem; }
        .portfolio-card .meta { color: #94a3b8; font-size: 0.95rem; }
        .chart-card { grid-column: span 2; background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; }
        .chart-placeholder { height: 220px; border-radius: 1rem; background: linear-gradient(180deg, rgba(236,200,121,.08), transparent); display: grid; place-items: center; color: #94a3b8; font-size: 0.95rem; }
        .recent-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; }
        .recent-card table { width: 100%; border-collapse: collapse; }
        .recent-card th, .recent-card td { text-align: left; padding: 0.95rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .recent-card th { color: rgba(226,232,240,0.72); font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.08em; }
        .recent-card td { color: rgba(226,232,240,0.92); font-size: 0.95rem; }
        .recent-card .amount-up { color: #34d399; }
        .recent-card .amount-down { color: #f87171; }
        .status-pill { display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.32rem 0.65rem; border-radius: 999px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 700; }
        .status-positive { background: rgba(52,211,153,.12); color: #34d399; }
        .status-negative { background: rgba(248,113,113,.12); color: #f87171; }
        .status-neutral { background: rgba(59,130,246,.12); color: #3b82f6; }
    </style>

    <div style="display:flex;flex-direction:column;gap:18px;">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:18px;">
            <div>
                <h1 style="font-size:2.5rem;margin-bottom:0.35rem;">Portfolio Overview</h1>
                <p style="color:#94a3b8;max-width:720px;">Track your portfolio balance, deposit flow, returns and recent activity in one place.</p>
            </div>
            <a href="{{ route('wallet.deposit') }}" style="display:inline-flex;align-items:center:inherit;padding:0.95rem 1.4rem;background:linear-gradient(135deg, #ecc879, #ff8d3a);color:#050d19;border-radius:999px;font-weight:700;text-decoration:none;">Add Funds</a>
        </div>

        <div class="portfolio-grid">
            <div class="portfolio-card">
                <h3>Portfolio Value</h3>
                <div class="value">${{ number_format($wallet->balance, 2) }}</div>
                <div class="meta">Current account balance across your wallet.</div>
            </div>
            <div class="portfolio-card">
                <h3>Total Deposited</h3>
                <div class="value">${{ number_format($totalDeposited, 2) }}</div>
                <div class="meta">All direct deposits to your account.</div>
            </div>
            <div class="portfolio-card">
                <h3>Total Withdrawn</h3>
                <div class="value">${{ number_format($totalWithdrawn, 2) }}</div>
                <div class="meta">Total funds withdrawn from your wallet.</div>
            </div>
            <div class="portfolio-card">
                <h3>Total Returns</h3>
                <div class="value">${{ number_format($totalReturns, 2) }}</div>
                <div class="meta">Returns earned from daily return cycles.</div>
            </div>
            <div class="portfolio-card">
                <h3>Net Worth</h3>
                <div class="value">${{ number_format($wallet->balance + max($totalWithdrawn - $totalReturns, 0), 2) }}</div>
                <div class="meta">Simple view of your current position and historical flow.</div>
            </div>
            <div class="portfolio-card">
                <h3>Risk & Allocation</h3>
                <div class="value" style="font-size:1.1rem;line-height:1.5;">Core wallet exposure only.<br>Allocation is currently managed by platform strategy.</div>
            </div>
        </div>

        <div class="chart-card">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.4rem;flex-wrap:wrap;gap:12px;">
                <div>
                    <h2 style="font-size:1.15rem;margin:0;color:#e2e8f0;">Portfolio Trend</h2>
                    <p style="color:#94a3b8;font-size:0.95rem;margin:0.4rem 0 0;">A high-level visualization of portfolio movement over time.</p>
                </div>
                <span class="status-pill status-positive">Up / Stable</span>
            </div>
            <div class="chart-placeholder">Live portfolio chart coming soon.</div>
        </div>

        <div class="recent-card">
            <h3 style="margin:0 0 1rem;">Recent Portfolio Activity</h3>
            @if($recentTransactions->isNotEmpty())
            <table>
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
                    @foreach($recentTransactions as $transaction)
                        @php
                            $positive = $transaction->type === 'deposit' || ($transaction->type === 'returns' && $transaction->amount >= 0) || ($transaction->type === 'adjustment' && $transaction->amount >= 0);
                            $sign = $transaction->type === 'withdrawal' || $transaction->amount < 0 ? '-' : '+';
                        @endphp
                        <tr>
                            <td>{{ $transaction->created_at->format('M j, Y') }}</td>
                            <td>{{ ucfirst($transaction->type) }}</td>
                            <td class="{{ $positive ? 'amount-up' : 'amount-down' }}">{{ $sign }}${{ number_format(abs($transaction->amount), 2) }}</td>
                            <td>${{ number_format($transaction->balance_after, 2) }}</td>
                            <td>{{ $transaction->description ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="empty-state">No recent portfolio activity yet.</div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
