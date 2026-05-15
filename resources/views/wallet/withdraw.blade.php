<x-dashboard-layout title="Withdraw Funds">
    <style>
        .container { max-width: 900px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2rem; }
        .page-header h1 { font-size: 2.75rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }
        .card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 2rem; }
        .card h2 { font-size: 1.5rem; margin-bottom: 1rem; }
        .balance-box { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 1rem 1.25rem; margin-bottom: 1.5rem; }
        .balance-box span { display: block; color: rgba(226,232,240,0.7); }
        .balance-box strong { display: block; font-size: 2rem; font-weight: 800; }
        .form-group { display: grid; gap: 0.85rem; margin-bottom: 1.25rem; }
        .form-group label { color: rgba(226,232,240,0.8); font-size: 0.95rem; }
        .form-group input, .form-group textarea { width: 100%; padding: 0.95rem 1rem; border-radius: 0.85rem; border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.05); color: white; }
        .form-group textarea { min-height: 120px; resize: vertical; }
        .submit-button { display: inline-flex; align-items: center; justify-content: center; padding: 1rem 1.25rem; border-radius: 0.85rem; background: #1F2937; color: white; font-weight: 700; text-transform: uppercase; border: 1px solid rgba(255,255,255,0.08); transition: transform 0.2s ease, background 0.2s ease; }
        .submit-button:hover { transform: translateY(-2px); background: rgba(255,255,255,0.08); }
        .note { color: rgba(226,232,240,0.7); font-size: 0.95rem; margin-top: 1rem; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; }
        .nav-link { padding: 0.85rem 1.25rem; border-radius: 0.85rem; text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: white; text-decoration: none; background: rgba(255,255,255,0.08); transition: transform 0.2s ease, background 0.2s ease; }
        .nav-link:hover { transform: translateY(-2px); background: rgba(255,255,255,0.14); }
    </style>

    <div class="container">        @if(session('error'))
            <div style=\"background: rgba(248, 113, 113, 0.1); border: 1px solid rgba(248, 113, 113, 0.3); padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; color: #f87171; font-size: 14px; display: flex; align-items: center; gap: 10px;\">
                <svg width=\"18\" height=\"18\" fill=\"currentColor\" viewBox=\"0 0 20 20\"><path fill-rule=\"evenodd\" d=\"M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z\"/></svg>
                {{ session('error') }}
            </div>
        @endif
        <div class="page-header">
            <h1>Withdraw Funds</h1>
            <p>Withdraw from your wallet balance. Amounts are deducted from your available wallet balance.</p>
        </div>

        <div class="nav-links">
            <a href="{{ route('wallet.index') }}" class="nav-link">Wallet</a>
            <a href="{{ route('wallet.deposit') }}" class="nav-link">Deposit</a>
        </div>

        <div class="card">
            <h2>Withdraw from Wallet</h2>
            <div class="balance-box">
                <div>
                    <span>Available Balance</span>
                    <strong>${{ number_format($wallet->balance, 2) }}</strong>
                </div>
                <div class="note">Withdrawals will reduce your available wallet balance immediately.</div>
            </div>

            <div style="background: rgba(248, 113, 113, 0.08); border: 2px solid rgba(248, 113, 113, 0.3); border-radius: 0.85rem; padding: 1.5rem; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: flex-start; gap: 1rem;">
                    <div style="font-size: 1.5rem; flex-shrink: 0;">⚠️</div>
                    <div>
                        <p style="margin: 0 0 0.5rem; font-weight: 600; color: #f87171; font-size: 1rem;">Withdrawal Address Required</p>
                        <p style="margin: 0 0 1rem; color: rgba(226, 232, 240, 0.8); font-size: 0.95rem;">You haven't set a withdrawal address yet. Please add your wallet address in Settings before you can make a withdrawal.</p>
                        <a href="{{ route('settings.index') }}" style="display: inline-block; padding: 0.75rem 1.25rem; background: #f87171; color: white; border-radius: 0.6rem; text-decoration: none; font-weight: 600; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">Set Withdrawal Address →</a>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('wallet.store.withdraw') }}" @if(!Auth::user()->withdrawal_address) style="opacity: 0.5; pointer-events: none;" @endif>
                @csrf
                <div class="form-group">
                    <label for="amount">Withdrawal Amount</label>
                    <input id="amount" name="amount" type="number" step="0.01" min="0.01" placeholder="Enter USD amount" required />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Withdrawal note (optional)"></textarea>
                </div>
                <button class="submit-button" type="submit">Withdraw Funds</button>
            </form>

            <p class="note">If your balance is too low, the withdrawal will be blocked automatically.</p>
        </div>
    </div>
</x-dashboard-layout>
