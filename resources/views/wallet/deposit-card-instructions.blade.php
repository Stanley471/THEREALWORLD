<x-dashboard-layout title="Complete Card Deposit">
    <style>
        .container { max-width: 900px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2rem; }
        .page-header h1 { font-size: 2.25rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }
        .card-panel { background: rgba(15,23,42,0.85); border: 1px solid rgba(151,0,8,0.35); border-radius: 1rem; padding: 1.5rem; }
        .details-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; margin-bottom: 1rem; }
        @media (max-width: 768px) { .details-grid { grid-template-columns: 1fr; } }
        .detail-box { background: rgba(255,255,255,0.03); border: 1px solid rgba(148,163,184,0.12); border-radius: 0.85rem; padding: 1rem; }
        .label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 0.4rem; }
        .value { color: #e2e8f0; font-size: 1.05rem; font-weight: 700; }
        .countdown { border: 1px solid rgba(248, 113, 113, 0.35); background: rgba(248, 113, 113, 0.10); border-radius: 0.85rem; padding: 1rem; margin-bottom: 1rem; }
        .countdown strong { font-size: 1.8rem; color: #fca5a5; letter-spacing: 0.06em; }
        .steps { margin: 1rem 0 1.5rem; padding-left: 1.1rem; color: rgba(226,232,240,0.88); }
        .steps li { margin-bottom: 0.55rem; }
        .actions { display: flex; gap: 0.85rem; flex-wrap: wrap; }
        .btn { border-radius: 0.8rem; padding: 0.95rem 1.2rem; border: 1px solid transparent; font-weight: 700; cursor: pointer; }
        .btn-primary { background: linear-gradient(135deg, #dc2626, #ef4444); color: #fff; }
        .btn-secondary { background: rgba(255,255,255,0.06); border-color: rgba(148,163,184,0.3); color: #e2e8f0; text-decoration: none; display: inline-flex; align-items: center; }
        .note { font-size: 0.9rem; color: rgba(226,232,240,0.7); margin-top: 1rem; }
    </style>

    <div class="container">
        <div class="page-header">
            <h1>Confirm Card Payment</h1>
            <p>Review your card deposit details below. Submit when ready — an administrator will verify and credit your wallet.</p>
        </div>

        <div class="countdown">
            <div class="label">Time Remaining</div>
            <strong id="countdown">30:00</strong>
        </div>

        <div class="card-panel">
            <div class="details-grid">
                <div class="detail-box">
                    <div class="label">Deposit Amount (USD)</div>
                    <div class="value">${{ number_format($pendingDeposit['amount'], 2) }}</div>
                </div>
                <div class="detail-box">
                    <div class="label">Payment Method</div>
                    <div class="value">Debit / Credit Card</div>
                </div>
                <div class="detail-box">
                    <div class="label">Cardholder</div>
                    <div class="value">{{ $pendingDeposit['cardholder_name'] }}</div>
                </div>
                <div class="detail-box">
                    <div class="label">Card Number</div>
                    <div class="value">**** **** **** {{ $pendingDeposit['card_last_four'] }}</div>
                </div>
                <div class="detail-box">
                    <div class="label">Expiry</div>
                    <div class="value">{{ $pendingDeposit['card_expiry'] }}</div>
                </div>
            </div>

            <ol class="steps">
                <li>Confirm the amount and card details above are correct.</li>
                <li>Click below to submit your card payment for admin review.</li>
                <li>Your wallet will be credited after an administrator approves the payment.</li>
            </ol>

            <div class="actions">
                <form method="POST" action="{{ route('wallet.deposit.complete') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Submit Card Payment</button>
                </form>
                <a href="{{ route('wallet.deposit') }}" class="btn btn-secondary">Cancel</a>
            </div>

            <p class="note">Card details are not charged automatically. Payments are verified manually by our team.</p>
        </div>
    </div>

    <script>
        (function () {
            const expiresAt = new Date('{{ $expiresAt->toIso8601String() }}').getTime();
            const expiredRedirect = "{{ route('wallet.deposit') }}";
            const countdownElement = document.getElementById('countdown');

            const updateCountdown = () => {
                const now = Date.now();
                const remainingMs = Math.max(0, expiresAt - now);
                const minutes = Math.floor(remainingMs / 60000);
                const seconds = Math.floor((remainingMs % 60000) / 1000);
                countdownElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                if (remainingMs <= 0) {
                    clearInterval(intervalId);
                    window.location.href = expiredRedirect;
                }
            };

            updateCountdown();
            const intervalId = setInterval(updateCountdown, 1000);
        })();
    </script>
</x-dashboard-layout>
