<x-dashboard-layout title="Dashboard">

{{-- ── Welcome Banner ── --}}
<div class="welcome-banner">
  <div>
    <h1>Welcome back, <span class="gold">{{ Auth::user()->name }}</span> 👋</h1>
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
    <div class="sc-label">Total Profit</div>
    <div class="sc-value" style="color:#34d399;">+$5,293.20</div>
    <div class="sc-change sc-up">
      <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
      +18.5% all time
    </div>
  </div>

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(255,141,58,.12);">
      <svg style="color:var(--orange);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
    </div>
    <div class="sc-label">Open Positions</div>
    <div class="sc-value orange">7</div>
    <div class="sc-change" style="color:#94a3b8;">3 long &nbsp;·&nbsp; 4 short</div>
  </div>

  <div class="stat-card">
    <div class="sc-icon" style="background:rgba(129,140,248,.12);">
      <svg style="color:#818cf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
    </div>
    <div class="sc-label">Win Rate</div>
    <div class="sc-value" style="color:#818cf8;">68.4%</div>
    <div class="sc-change sc-up">
      <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
      +2.1% vs last month
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

  {{-- Markets Table --}}
  <div class="card">
    <div class="card-header">
      <h2>📈 Live Markets</h2>
      <a href="#" style="font-size:13px;color:var(--gold);text-decoration:none;font-weight:600;">View All →</a>
    </div>
    <div style="padding:0 10px 10px;">
      <table class="mkt-table">
        <thead>
          <tr>
            <th>Asset</th>
            <th>Price</th>
            <th>24h Change</th>
            <th>7d Trend</th>
            <th>Market Cap</th>
          </tr>
        </thead>
        <tbody>
          @php
            $markets = [
              ['sym'=>'BTC','name'=>'Bitcoin',  'price'=>'$103,412','chg'=>'+2.34%','up'=>true, 'cap'=>'$2.04T','color'=>'#F7931A','bars'=>[30,45,38,60,55,70,80]],
              ['sym'=>'ETH','name'=>'Ethereum', 'price'=>'$3,841',  'chg'=>'+1.87%','up'=>true, 'cap'=>'$462B', 'color'=>'#627EEA','bars'=>[50,42,55,48,65,60,72]],
              ['sym'=>'SOL','name'=>'Solana',   'price'=>'$178.20', 'chg'=>'-0.94%','up'=>false,'cap'=>'$84B',  'color'=>'#9945FF','bars'=>[70,60,75,55,50,58,52]],
              ['sym'=>'BNB','name'=>'BNB',      'price'=>'$612.40', 'chg'=>'+0.52%','up'=>true, 'cap'=>'$91B',  'color'=>'#F3BA2F','bars'=>[40,45,42,50,48,55,58]],
              ['sym'=>'XRP','name'=>'Ripple',   'price'=>'$0.6240', 'chg'=>'-1.20%','up'=>false,'cap'=>'$35B',  'color'=>'#00AAE4','bars'=>[60,55,65,50,45,52,48]],
            ];
          @endphp
          @foreach($markets as $m)
          <tr>
            <td>
              <div class="mkt-coin">
                <div class="coin-dot" style="background:{{ $m['color'] }}22;color:{{ $m['color'] }};font-size:11px;">{{ $m['sym'] }}</div>
                <div>
                  <div style="font-weight:600;font-size:14px;">{{ $m['name'] }}</div>
                  <div style="font-size:11px;color:#64748b;">{{ $m['sym'] }}</div>
                </div>
              </div>
            </td>
            <td style="font-weight:700;">{{ $m['price'] }}</td>
            <td><span class="pill {{ $m['up'] ? 'pill-up' : 'pill-down' }}">{{ $m['chg'] }}</span></td>
            <td>
              <div class="sparkbar">
                @foreach($m['bars'] as $i=>$h)
                  <span style="height:{{ $h }}%;{{ $i===count($m['bars'])-1 ? 'opacity:1;background:'.($m['up']?'#34d399':'#f87171').';' : '' }}"></span>
                @endforeach
              </div>
            </td>
            <td style="color:#94a3b8;font-size:13px;">{{ $m['cap'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- Activity Feed --}}
  <div class="card">
    <div class="card-header">
      <h2>⚡ Recent Activity</h2>
      <span style="font-size:12px;color:#64748b;">Today</span>
    </div>
    <div class="card-body" style="padding-top:6px;padding-bottom:6px;">
      @forelse($recentActivities as $activity)
      @php
        $isDeposit = $activity->type === 'deposit';
        $icon = $isDeposit ? '💰' : '💸';
        $title = $isDeposit ? 'Deposit Confirmed' : 'Withdrawal Sent';
        $sub = $activity->description ?: ucfirst($activity->type);
        $amount = ($isDeposit ? '+' : '-') . '$' . number_format($activity->amount, 2);
        $bg = $isDeposit ? 'rgba(52,211,153,.10)' : 'rgba(248,113,113,.10)';
        $time = optional($activity->created_at)->diffForHumans() ?? 'just now';
      @endphp
      <div class="activity-item">
        <div class="act-icon" style="background:{{ $bg }};font-size:16px;">{{ $icon }}</div>
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

{{-- ── Course Progress ── --}}
<div class="card">
  <div class="card-header">
    <h2>🎓 My Courses</h2>
    <a href="#" style="font-size:13px;color:var(--gold);text-decoration:none;font-weight:600;">Browse All →</a>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:0 28px;padding:6px 22px 16px;">
    @php
      $courses = [
        ['icon'=>'📈','name'=>'Crypto Trading','pct'=>72],
        ['icon'=>'💹','name'=>'Crypto Investing','pct'=>45],
        ['icon'=>'🤖','name'=>'AI Automation','pct'=>28],
        ['icon'=>'✍️','name'=>'Copywriting','pct'=>90],
        ['icon'=>'💼','name'=>'Business Mastery','pct'=>15],
        ['icon'=>'📱','name'=>'Client Acquisition','pct'=>60],
      ];
    @endphp
    @foreach($courses as $c)
    <div class="course-item">
      <div class="course-thumb" style="background:rgba(236,200,121,.10);">{{ $c['icon'] }}</div>
      <div class="course-info">
        <div class="course-name">{{ $c['name'] }}</div>
        <div class="course-prog">
          <div class="course-prog-bar" style="width:{{ $c['pct'] }}%;"></div>
        </div>
        <div class="course-pct">{{ $c['pct'] }}% complete</div>
      </div>
    </div>
    @endforeach
  </div>
</div>

</x-dashboard-layout>
