<x-dashboard-layout title="Settings">

    <style>
        .settings-page { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .settings-grid { display: grid; gap: 20px; }
        .settings-card { background: rgba(15,23,42,0.92); border: 1px solid rgba(148,163,184,0.12); border-radius: 20px; overflow: hidden; }
        .settings-card .card-header { display: flex; flex-direction: column; gap: 8px; padding: 1.5rem 1.75rem; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .settings-card .card-header h2, .settings-card .card-header h1 { margin: 0; color: #e2e8f0; }
        .settings-card .card-header p { margin: 0; color: #94a3b8; font-size: 0.95rem; }
        .settings-card .card-body { padding: 1.5rem 1.75rem; display: grid; gap: 18px; }
        .settings-field { display: grid; gap: 0.65rem; }
        .settings-field label { display: block; font-weight: 600; color: #e2e8f0; font-size: 0.95rem; }
        .settings-field p { margin: 0; color: #94a3b8; font-size: 0.88rem; line-height: 1.6; }
        .settings-input { width: 100%; padding: 14px 16px; border-radius: 12px; border: 1px solid #334155; background: #0f172a; color: #e2e8f0; font-size: 0.95rem; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace; transition: border-color .2s, box-shadow .2s; }
        .settings-input:focus { border-color: #0ea5e9; box-shadow: 0 0 0 4px rgba(14,165,233,0.12); outline: none; }
        .settings-actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .settings-button, .settings-reset { min-width: 160px; padding: 12px 18px; border-radius: 12px; font-weight: 700; cursor: pointer; transition: transform .15s, opacity .15s, background .15s; }
        .settings-button { background: #ecc879; color: #050d19; border: none; }
        .settings-button:hover { opacity: .95; transform: translateY(-1px); }
        .settings-reset { background: #1e293b; color: #e2e8f0; border: 1px solid #334155; }
        .settings-reset:hover { background: #334155; }
        .settings-note { background: rgba(14,165,233,0.08); border: 1px solid rgba(14,165,233,0.18); padding: 14px 16px; border-radius: 14px; color: #c7f0ff; font-size: 0.95rem; }
        @media (max-width: 820px) {
            .settings-card .card-header { padding: 1.25rem 1.25rem; }
            .settings-card .card-body { padding: 1.25rem 1.25rem; }
            .settings-actions { flex-direction: column; }
        }
        @media (max-width: 640px) {
            .settings-page { padding: 16px; }
            .settings-card .card-header { align-items: flex-start; }
        }
    </style>

<div class="settings-page">
  @if(session('success'))
    <div style="background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.3);padding:12px 16px;border-radius:10px;margin-bottom:20px;color:#10b981;font-size:14px;display:flex;align-items:center;gap:10px;">
      <svg width="18" height="18" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></path></svg>
      {{ session('success') }}
    </div>
  @endif

  <div class="settings-grid">
    <!-- Settings Header -->
    <div class="card">
      <div class="card-header">
        <div style="display:flex;align-items:center;gap:10px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8a4 4 0 100 8 4 4 0 000-8z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 01-2.83 2.83l-.06-.06A1.65 1.65 0 0013 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.6 13a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 0011 4.6a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 11c.92 0 1.7.75 1.7 1.7z"/></svg>
          <h1 style="font-size:28px;margin:0;">Settings</h1>
        </div>
      </div>
    </div>

    <!-- Withdrawal Settings -->
    <div class="card">
      <div class="card-header">
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
          <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 4l9 5.75M4.5 10.5v8.25a1.5 1.5 0 001.5 1.5h12a1.5 1.5 0 001.5-1.5V10.5"/></svg>
          <h2>Withdrawal Settings</h2>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('settings.withdrawal.update') }}" class="settings-form">
          @csrf
          
          <div class="settings-field">
            <label for="withdrawal_address">Withdrawal Address</label>
            <p>Specify the address where your crypto withdrawals will be sent. Make sure this is a valid wallet address.</p>
            
            <input 
              type="text" 
              id="withdrawal_address" 
              name="withdrawal_address" 
              value="{{ old('withdrawal_address', $user->withdrawal_address) }}"
              placeholder="Enter your wallet address (e.g., 1A1z7agoat...)"
              class="settings-input"
            >
            
            @error('withdrawal_address')
              <p style="color:#f87171;font-size:13px;margin-top:8px;">{{ $message }}</p>
            @enderror
            
            @if($user->withdrawal_address)
              <div class="settings-note">
                <strong>Current address:</strong> {{ Str::limit($user->withdrawal_address, 50, '...') }}
              </div>
            @endif
          </div>

          <div class="settings-actions">
            <button type="submit" class="settings-button">
              Save Withdrawal Address
            </button>
            <button type="reset" class="settings-reset">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Other Settings Placeholder -->
    <div class="card">
      <div class="card-header" style="display:flex;align-items:center;gap:10px;">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.567 3-3.5S13.657 4 12 4 9 5.567 9 7.5 10.343 11 12 11zm0 0v5m-3 3h6"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 11V8a8 8 0 0116 0v3"/></svg>
        <h2>Security Settings</h2>
      </div>
      <div class="card-body" style="display:grid;gap:12px;">
        <div class="settings-note" style="background:rgba(94,234,212,.08);border:1px solid rgba(94,234,212,.2);border-radius:8px;font-size:14px;color:#2dd4bf;">
          ✓ Two-factor authentication is disabled
        </div>
        <button class="settings-reset" style="background:transparent;border:1px solid #475569;color:#94a3b8;">
          Enable 2FA
        </button>
      </div>
    </div>

    <!-- Notification Settings Placeholder -->
    <div class="card">
      <div class="card-header" style="display:flex;align-items:center;gap:10px;">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a1 1 0 10-2 0v1.083A6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z"/></svg>
        <h2>Notification Settings</h2>
      </div>
      <div class="card-body" style="display:grid;gap:12px;">
        <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;flex-wrap:wrap;gap:12px;">
          <div>
            <p style="font-weight:600;margin:0 0 4px;">Email notifications</p>
            <p style="font-size:13px;color:#94a3b8;margin:0;">Receive updates about deposits, withdrawals, and trades</p>
          </div>
          <input type="checkbox" checked style="width:20px;height:20px;cursor:pointer;accent-color:var(--gold);">
        </div>
        <div style="border-top:1px solid #334155;padding-top:12px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
          <div>
            <p style="font-weight:600;margin:0 0 4px;">Push notifications</p>
            <p style="font-size:13px;color:#94a3b8;margin:0;">Get instant alerts on your device</p>
          </div>
          <input type="checkbox" style="width:20px;height:20px;cursor:pointer;accent-color:var(--gold);">
        </div>
      </div>
    </div>
  </div>
</div>

</x-dashboard-layout>
