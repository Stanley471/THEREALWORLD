<x-dashboard-layout title="Deposit Submitted">
    <style>
        .container { max-width: 720px; margin: 0 auto; }
        .card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 2rem; text-align: center; }
        .icon-wrap { width: 72px; height: 72px; margin: 0 auto 1.25rem; border-radius: 50%; background: rgba(52,211,153,0.12); display: flex; align-items: center; justify-content: center; color: #34d399; }
        h1 { font-size: 2rem; margin-bottom: 0.75rem; }
        .lead { color: rgba(226,232,240,0.82); line-height: 1.6; margin-bottom: 1.5rem; }
        .meta { display: grid; gap: 0.75rem; text-align: left; margin: 1.5rem 0; }
        .meta-row { background: rgba(255,255,255,0.03); border: 1px solid rgba(148,163,184,0.12); border-radius: 0.75rem; padding: 0.9rem 1rem; display: flex; justify-content: space-between; gap: 1rem; }
        .meta-row span { color: #94a3b8; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.06em; }
        .meta-row strong { color: #e2e8f0; word-break: break-all; }
        .status-pill { display: inline-flex; padding: 0.35rem 0.85rem; border-radius: 999px; background: rgba(236,200,121,0.15); color: #ecc879; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 1rem; }
        .actions { display: flex; gap: 0.85rem; justify-content: center; flex-wrap: wrap; margin-top: 1.5rem; }
        .btn { border-radius: 0.8rem; padding: 0.9rem 1.2rem; font-weight: 700; text-decoration: none; }
        .btn-primary { background: #FF8D3A; color: #050d19; }
        .btn-secondary { background: rgba(255,255,255,0.06); border: 1px solid rgba(148,163,184,0.25); color: #e2e8f0; }
    </style>

    <div class="container">
        <div class="card">
            <div class="icon-wrap">
                <svg width="36" height="36" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="status-pill">Awaiting Confirmation</span>
            <h1>Your deposit is being confirmed</h1>
            <p class="lead">
                We received your payment request. An administrator will verify your crypto transfer and update your wallet balance.
                This can take a while depending on network confirmations and review volume.
            </p>

            <div class="meta">
                <div class="meta-row">
                    <span>Reference</span>
                    <strong>{{ $deposit->reference }}</strong>
                </div>
                <div class="meta-row">
                    <span>Amount</span>
                    <strong>${{ number_format($deposit->amount, 2) }} USD</strong>
                </div>
                <div class="meta-row">
                    <span>Payment Method</span>
                    <strong>{{ ucfirst($deposit->payment_method ?? 'crypto') }}</strong>
                </div>
                <div class="meta-row">
                    <span>{{ ($deposit->payment_method ?? 'crypto') === 'card' ? 'Card' : 'Currency' }}</span>
                    <strong>
                        @if(($deposit->payment_method ?? 'crypto') === 'card')
                            **** {{ $deposit->card_last_four }} ({{ $deposit->cardholder_name }})
                        @else
                            {{ $deposit->currency }}
                        @endif
                    </strong>
                </div>
                <div class="meta-row">
                    <span>Submitted</span>
                    <strong>{{ $deposit->created_at->format('M j, Y g:i A') }}</strong>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('wallet.index') }}" class="btn btn-primary">Back to Wallet</a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go to Dashboard</a>
            </div>
        </div>
    </div>
</x-dashboard-layout>
