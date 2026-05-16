<x-dashboard-layout title="Dashboard">

{{-- ── Welcome Banner ── --}}
<div class="welcome-banner">
  <div>
    <h1>Welcome back, <span class="gold">{{ Auth::user()->name }}</span></h1>
    <p>Here's what's happening in your portfolio today.</p>
  </div>
  <a class="banner-badge" href="{{ route('wallet.deposit') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    Make a Deposit
  </a>
</div>

{{-- ── Stat Cards ── --}}
<div class="stats-grid">

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(236,200,121,.12);">
      <svg class="gold" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93V18h-2v1.93A8.001 8.001 0 014.07 13H6v-2H4.07A8.001 8.001 0 0111 4.07V6h2V4.07A8.001 8.001 0 0119.93 11H18v2h1.93A8.001 8.001 0 0113 19.93z"/></svg>
    </div>
    <div class="sc-label">Total Balance</div>
    <div class="sc-value gold">${{ number_format($balance, 2) }}</div>
    <div class="sc-change sc-up">
      <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
      +3.24% today
    </div>
  </div>

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(52,211,153,.10);">
      <svg style="color:#34d399;" fill="currentColor" viewBox="0 0 24 24"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
    </div>
    <div class="sc-label">Total Deposited</div>
    <div class="sc-value" style="color:#34d399;">${{ number_format($totalDeposited, 2) }}</div>
    <div class="sc-change sc-up">
      <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
      {{ $transactionCount }} transactions
    </div>
  </div>

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(255,141,58,.12);">
      <svg style="color:var(--orange);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
    </div>
    <div class="sc-label">Total Withdrawn</div>
    <div class="sc-value orange">${{ number_format($totalWithdrawn, 2) }}</div>
    <div class="sc-change" style="color:#94a3b8;">Net flow: ${{ number_format($netFlow, 2) }}</div>
  </div>

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(129,140,248,.12);">
      <svg style="color:#818cf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
    </div>
    <div class="sc-label">Transactions</div>
    <div class="sc-value" style="color:#818cf8;">{{ $transactionCount }}</div>
    <div class="sc-change sc-up">
      <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
      Last: {{ optional($lastTransaction?->created_at)->diffForHumans() ?? 'No activity' }}
    </div>
  </div>

</div>

{{-- ── Quick Actions ── --}}
<div class="qa-grid">
  <a class="qa-btn" href="{{ route('wallet.deposit') }}">
    <div class="qa-icon" style="background:rgba(236,200,121,.12);">
      <svg class="gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    </div>
    <span>Deposit</span>
  </a>
  <a class="qa-btn" href="{{ route('wallet.withdraw') }}">
    <div class="qa-icon" style="background:rgba(255,141,58,.12);">
      <svg style="color:var(--orange);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/></svg>
    </div>
    <span>Withdraw</span>
  </a>
  <a class="qa-btn" href="#">
    <div class="qa-icon" style="background:rgba(52,211,153,.10);">
      <svg style="color:#34d399;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
    </div>
    <span>Transfer</span>
  </a>
  <a class="qa-btn" href="#">
    <div class="qa-icon" style="background:rgba(129,140,248,.12);">
      <svg style="color:#818cf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10"/></svg>
    </div>
    <span>Analytics</span>
  </a>
</div>

{{-- ── Markets + Activity ── --}}
<div class="two-col">

  <div class="card">
    <div class="card-header" style="display:flex;align-items:center;justify-content:space-between;gap:10px;">
      <div style="display:flex;align-items:center;gap:10px;">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17h18M7 13V5m6 12V9m6 4V7"/></svg>
        <h2>Wallet Activity</h2>
      </div>
      <span style="font-size:13px;color:#64748b;">Latest transactions</span>
    </div>
    <div style="padding:0 10px 10px;">
      @if($recentActivities->isEmpty())
        <div class="empty-state">No transactions yet. Start by making a deposit.</div>
      @else
      <table class="mkt-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentActivities as $activity)
          <tr>
            <td>{{ $activity->created_at->format('M d') }}</td>
            <td>
              <span class="pill {{ $activity->type === 'deposit' ? 'pill-up' : 'pill-down' }}">
                {{ ucfirst($activity->type) }}
              </span>
            </td>
            <td style="color:#94a3b8;font-size:13px;">{{ $activity->description ?? 'No description' }}</td>
            <td style="font-weight:700;">{{ $activity->type === 'deposit' ? '+' : '-' }}${{ number_format($activity->amount, 2) }}</td>
            <td style="color:#94a3b8;font-size:13px;">${{ number_format($activity->balance_after, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>

  {{-- Activity Feed --}}
  <div class="card">
    <div class="card-header" style="display:flex;align-items:center;justify-content:space-between;gap:10px;">
      <div style="display:flex;align-items:center;gap:10px;">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 2L3 14h7v8l10-12h-7z"/></svg>
        <h2>Recent Activity</h2>
      </div>
      <span style="font-size:12px;color:#64748b;">Today</span>
    </div>
    <div class="card-body" style="padding-top:6px;padding-bottom:6px;">
      @forelse($recentActivities as $activity)
      @php
        $isDeposit = $activity->type === 'deposit';
        $title = $isDeposit ? 'Deposit Confirmed' : 'Withdrawal Sent';
        $sub = $activity->description ?: ucfirst($activity->type);
        $amount = ($isDeposit ? '+' : '-') . '$' . number_format($activity->amount, 2);
        $bg = $isDeposit ? 'rgba(52,211,153,.10)' : 'rgba(248,113,113,.10)';
        $time = optional($activity->created_at)->diffForHumans() ?? 'just now';
      @endphp
      <div class="activity-item">
        <div class="act-icon" style="background:{{ $bg }};font-size:16px;display:flex;align-items:center;justify-content:center;">
          @if($isDeposit)
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8"/></svg>
          @else
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V8m-4 4h8"/></svg>
          @endif
        </div>
        <div style="flex:1;min-width:0;">
          <div class="act-title">{{ $title }}</div>
          <div class="act-time">{{ $sub }} &middot; {{ $time }}</div>
        </div>
        <div class="act-amount {{ $isDeposit ? 'sc-up' : 'sc-down' }}">{{ $amount }}</div>
      </div>
      @empty
      <div class="empty-state">No recent activity yet. Make a deposit or trade to see activity here.</div>
      @endforelse
    </div>
  </div>

</div>

{{-- ── Account Summary ── --}}
<div class="card">
  <div class="card-header" style="display:flex;align-items:center;justify-content:space-between;gap:10px;">
    <div style="display:flex;align-items:center;gap:10px;">
      <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/></svg>
      <h2>Account Summary</h2>
    </div>
    <a href="{{ route('settings.index') }}" style="font-size:13px;color:var(--gold);text-decoration:none;font-weight:600;">Manage Settings →</a>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:0 28px;padding:6px 22px 16px;">
    <div class="course-item">
      <div class="course-thumb" style="background:rgba(236,200,121,.10);">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.13 0-2.16.39-3 1.04C8.16 9.39 8 10.18 8 11a4 4 0 108 0c0-.82-.16-1.61-.44-2.32C14.16 8.39 13.13 8 12 8z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v6"/></svg>
      </div>
      <div class="course-info">
        <div class="course-name">Withdrawal Address</div>
        <div class="course-prog" style="height:auto;">
          <div class="course-prog-bar" style="width:{{ Auth::user()->withdrawal_address ? '100%' : '20%' }};background: {{ Auth::user()->withdrawal_address ? 'var(--gold)' : '#f87171' }}; height: 8px; border-radius: 999px;"></div>
        </div>
        <div class="course-pct">{{ Auth::user()->withdrawal_address ? 'Configured' : 'Not set' }}</div>
      </div>
    </div>

    <div class="course-item">
      <div class="course-thumb" style="background:rgba(52,211,153,.10);">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17h18M8 13v4M12 9v8M16 5v12"/></svg>
      </div>
      <div class="course-info">
        <div class="course-name">Total Transactions</div>
        <div class="course-prog" style="height:auto;">
          <div class="course-prog-bar" style="width:100%;background:rgba(52,211,153,.6);height:8px;border-radius:999px;"></div>
        </div>
        <div class="course-pct">{{ $transactionCount }}</div>
      </div>
    </div>

    <div class="course-item">
      <div class="course-thumb" style="background:rgba(129,140,248,.10);">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l6 6 4-4 6 6"/></svg>
      </div>
      <div class="course-info">
        <div class="course-name">Net Balance Flow</div>
        <div class="course-prog" style="height:auto;">
          <div class="course-prog-bar" style="width:100%;background:rgba(129,140,248,.6);height:8px;border-radius:999px;"></div>
        </div>
        <div class="course-pct">${{ number_format($netFlow, 2) }}</div>
      </div>
    </div>

    <div class="course-item">
      <div class="course-thumb" style="background:rgba(255,141,58,.10);">
        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      </div>
      <div class="course-info">
        <div class="course-name">Latest Transaction</div>
        <div class="course-prog" style="height:auto;">
          <div class="course-prog-bar" style="width:100%;background:rgba(255,141,58,.6);height:8px;border-radius:999px;"></div>
        </div>
        <div class="course-pct">{{ optional($lastTransaction?->created_at)->diffForHumans() ?? 'None yet' }}</div>
      </div>
    </div>
  </div>
</div>

</x-dashboard-layout>
