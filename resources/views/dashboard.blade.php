<x-dashboard-layout title="Dashboard">

<style>
/* ─── Design tokens ─── */
:root{--gold:#ecc879;--orange:#FF8D3A;--bg-card:rgba(15,23,42,.75);--border:rgba(148,163,184,.10);}

/* ─── Utility ─── */
.gold{color:var(--gold);}
.orange{color:var(--orange);}

/* ─── Welcome banner ─── */
.welcome-banner{
  background:linear-gradient(135deg,rgba(236,200,121,.12),rgba(255,141,58,.08));
  border:1px solid rgba(236,200,121,.18);
  border-radius:18px;
  padding:28px 32px;
  display:flex;align-items:center;justify-content:space-between;
  gap:20px;margin-bottom:28px;
  position:relative;overflow:hidden;
}
.welcome-banner::before{
  content:'';position:absolute;top:-60px;right:-60px;
  width:220px;height:220px;border-radius:50%;
  background:radial-gradient(circle,rgba(236,200,121,.14),transparent 70%);
  pointer-events:none;
}
.welcome-banner h1{font-size:22px;font-weight:700;margin-bottom:4px;}
.welcome-banner p{font-size:14px;color:#64748b;}
.banner-badge{
  display:inline-flex;align-items:center;gap:8px;
  padding:10px 20px;border-radius:50px;
  background:linear-gradient(135deg,var(--gold),var(--orange));
  color:#050d19;font-weight:700;font-size:13px;
  white-space:nowrap;cursor:pointer;
  transition:box-shadow .2s,transform .2s;
}
.banner-badge:hover{box-shadow:0 8px 24px rgba(236,200,121,.35);transform:translateY(-2px);}

/* ─── Stat cards ─── */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;}
@media(max-width:1100px){.stats-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:560px){.stats-grid{grid-template-columns:1fr;}}

.stat-card{
  background:var(--bg-card);
  border:1px solid var(--border);
  border-radius:16px;
  padding:22px 22px 18px;
  backdrop-filter:blur(20px);
  position:relative;overflow:hidden;
  transition:border-color .2s,transform .2s;
}
.stat-card:hover{border-color:rgba(236,200,121,.28);transform:translateY(-2px);}
.stat-card .sc-icon{
  width:42px;height:42px;border-radius:12px;
  display:flex;align-items:center;justify-content:center;
  margin-bottom:14px;
}
.sc-icon svg{width:20px;height:20px;}
.stat-card .sc-label{font-size:12px;color:#64748b;text-transform:uppercase;letter-spacing:.1em;margin-bottom:6px;}
.stat-card .sc-value{font-size:26px;font-weight:700;line-height:1;margin-bottom:6px;}
.stat-card .sc-change{font-size:12px;display:flex;align-items:center;gap:4px;}
.sc-up{color:#34d399;} .sc-down{color:#f87171;}

/* ─── Two-column layout ─── */
.two-col{display:grid;grid-template-columns:1fr 340px;gap:20px;margin-bottom:28px;}
@media(max-width:1000px){.two-col{grid-template-columns:1fr;}}

/* ─── Card shell ─── */
.card{
  background:var(--bg-card);
  border:1px solid var(--border);
  border-radius:16px;
  backdrop-filter:blur(20px);
  overflow:hidden;
}
.card-header{
  display:flex;align-items:center;justify-content:space-between;
  padding:18px 22px;
  border-bottom:1px solid var(--border);
}
.card-header h2{font-size:15px;font-weight:700;}
.card-body{padding:20px 22px;}

/* ─── Market table ─── */
.mkt-table{width:100%;border-collapse:collapse;}
.mkt-table th{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.1em;padding:0 12px 12px;text-align:left;border-bottom:1px solid var(--border);}
.mkt-table th:last-child,.mkt-table td:last-child{text-align:right;}
.mkt-table td{padding:14px 12px;font-size:14px;border-bottom:1px solid rgba(148,163,184,.06);}
.mkt-table tr:last-child td{border-bottom:none;}
.mkt-table tr:hover td{background:rgba(236,200,121,.04);}
.mkt-coin{display:flex;align-items:center;gap:10px;}
.coin-dot{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;}
.price-up{color:#34d399;} .price-down{color:#f87171;}
.pill{display:inline-flex;align-items:center;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;}
.pill-up{background:rgba(52,211,153,.12);color:#34d399;}
.pill-down{background:rgba(248,113,113,.12);color:#f87171;}

/* ─── Activity feed ─── */
.activity-item{display:flex;align-items:flex-start;gap:12px;padding:14px 0;border-bottom:1px solid rgba(148,163,184,.06);}
.activity-item:last-child{border-bottom:none;}
.act-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.act-icon svg{width:16px;height:16px;}
.act-title{font-size:13px;font-weight:600;margin-bottom:2px;}
.act-time{font-size:11px;color:#64748b;}
.act-amount{font-size:13px;font-weight:700;margin-left:auto;white-space:nowrap;}

/* ─── Mini sparkline bars ─── */
.sparkbar{display:flex;align-items:flex-end;gap:3px;height:36px;}
.sparkbar span{width:5px;border-radius:3px 3px 0 0;background:var(--gold);opacity:.5;transition:opacity .2s;}
.sparkbar span.hi{opacity:1;}

/* ─── Quick actions ─── */
.qa-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:28px;}
@media(max-width:700px){.qa-grid{grid-template-columns:repeat(2,1fr);}}
.qa-btn{
  background:var(--bg-card);
  border:1px solid var(--border);
  border-radius:14px;
  padding:18px 14px;
  display:flex;flex-direction:column;align-items:center;gap:10px;
  cursor:pointer;transition:border-color .2s,transform .2s;
  text-decoration:none;
}
.qa-btn:hover{border-color:rgba(236,200,121,.28);transform:translateY(-2px);}
.qa-btn .qa-icon{width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;}
.qa-btn .qa-icon svg{width:20px;height:20px;}
.qa-btn span{font-size:13px;font-weight:600;color:#e2e8f0;}

/* ─── Course progress ─── */
.course-item{display:flex;align-items:center;gap:14px;padding:14px 0;border-bottom:1px solid rgba(148,163,184,.06);}
.course-item:last-child{border-bottom:none;}
.course-thumb{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;}
.course-info{flex:1;min-width:0;}
.course-name{font-size:13px;font-weight:600;margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.course-prog{height:4px;background:rgba(255,255,255,.08);border-radius:4px;overflow:hidden;}
.course-prog-bar{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--gold),var(--orange));}
.course-pct{font-size:11px;color:#64748b;margin-top:4px;}
</style>

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
  <a class="qa-btn" href="#">
    <div class="qa-icon" style="background:rgba(236,200,121,.12);">
      <svg class="gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    </div>
    <span>Deposit</span>
  </a>
  <a class="qa-btn" href="#">
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
      @php
        $activities = [
          ['icon'=>'💰','title'=>'Deposit Confirmed','sub'=>'Bank transfer received','amount'=>'+$2,500.00','up'=>true,'bg'=>'rgba(52,211,153,.10)','time'=>'2 min ago'],
          ['icon'=>'📈','title'=>'BTC Position Opened','sub'=>'Long · 0.025 BTC','amount'=>'$2,585.30','up'=>true,'bg'=>'rgba(236,200,121,.10)','time'=>'18 min ago'],
          ['icon'=>'✅','title'=>'ETH Trade Closed','sub'=>'Profit taken','amount'=>'+$312.40','up'=>true,'bg'=>'rgba(52,211,153,.10)','time'=>'1h ago'],
          ['icon'=>'📉','title'=>'SOL Stop-Loss Hit','sub'=>'Short · 5 SOL','amount'=>'-$48.20','up'=>false,'bg'=>'rgba(248,113,113,.10)','time'=>'3h ago'],
          ['icon'=>'🎓','title'=>'Course Completed','sub'=>'Crypto Trading — Module 4','amount'=>'','up'=>true,'bg'=>'rgba(129,140,248,.12)','time'=>'5h ago'],
          ['icon'=>'💸','title'=>'Withdrawal Sent','sub'=>'To bank account','amount'=>'-$1,000.00','up'=>false,'bg'=>'rgba(255,141,58,.10)','time'=>'Yesterday'],
        ];
      @endphp
      @foreach($activities as $a)
      <div class="activity-item">
        <div class="act-icon" style="background:{{ $a['bg'] }};font-size:16px;">{{ $a['icon'] }}</div>
        <div style="flex:1;min-width:0;">
          <div class="act-title">{{ $a['title'] }}</div>
          <div class="act-time">{{ $a['sub'] }} &middot; {{ $a['time'] }}</div>
        </div>
        @if($a['amount'])
          <div class="act-amount {{ $a['up'] ? 'sc-up' : 'sc-down' }}">{{ $a['amount'] }}</div>
        @endif
      </div>
      @endforeach
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
