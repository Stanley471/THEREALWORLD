<x-admin-layout title="Admin Dashboard">
<style>
:root{--gold:#ecc879;--orange:#FF8D3A;--red:#f87171;--green:#34d399;--purple:#a78bfa;--card:rgba(10,16,28,.80);--border:rgba(148,163,184,.09);}

/* Stat cards */
.adm-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px;}
@media(max-width:1000px){.adm-stats{grid-template-columns:repeat(2,1fr);}}
@media(max-width:560px){.adm-stats{grid-template-columns:1fr;}}

.adm-stat{
    background:var(--card);border:1px solid var(--border);border-radius:16px;
    padding:22px 20px 18px;backdrop-filter:blur(20px);
    position:relative;overflow:hidden;transition:border-color .2s,transform .2s;
}
.adm-stat:hover{transform:translateY(-2px);}
.adm-stat::before{
    content:'';position:absolute;top:-30px;right:-30px;
    width:100px;height:100px;border-radius:50%;opacity:.06;
    background:var(--accent);
}
.stat-icon{width:40px;height:40px;border-radius:11px;display:flex;align-items:center;justify-content:center;margin-bottom:14px;}
.stat-icon svg{width:18px;height:18px;}
.stat-lbl{font-size:11px;color:#475569;text-transform:uppercase;letter-spacing:.12em;margin-bottom:5px;}
.stat-val{font-size:28px;font-weight:800;line-height:1;margin-bottom:5px;}
.stat-sub{font-size:12px;display:flex;align-items:center;gap:4px;color:#64748b;}
.up{color:var(--green);} .dn{color:var(--red);}

/* 2-col */
.adm-2col{display:grid;grid-template-columns:1fr 320px;gap:18px;margin-bottom:24px;}
@media(max-width:960px){.adm-2col{grid-template-columns:1fr;}}

/* Card */
.adm-card{background:var(--card);border:1px solid var(--border);border-radius:16px;backdrop-filter:blur(20px);overflow:hidden;}
.adm-card-header{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid var(--border);}
.adm-card-header h2{font-size:14px;font-weight:700;}
.adm-card-body{padding:18px 20px;}
.view-all{font-size:12px;color:var(--red);text-decoration:none;font-weight:600;}
.view-all:hover{text-decoration:underline;}

/* User table */
.usr-table{width:100%;border-collapse:collapse;}
.usr-table th{font-size:10px;color:#475569;text-transform:uppercase;letter-spacing:.12em;padding:0 10px 10px;text-align:left;border-bottom:1px solid var(--border);}
.usr-table td{padding:12px 10px;font-size:13px;border-bottom:1px solid rgba(148,163,184,.05);}
.usr-table tr:last-child td{border-bottom:none;}
.usr-table tr:hover td{background:rgba(239,68,68,.03);}
.usr-avatar{width:30px;height:30px;border-radius:50%;background:linear-gradient(135deg,var(--gold),var(--orange));display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#04080f;flex-shrink:0;}
.usr-info{display:flex;align-items:center;gap:10px;}
.usr-name{font-weight:600;font-size:13px;}
.usr-email{font-size:11px;color:#475569;}
.badge{display:inline-flex;align-items:center;padding:2px 8px;border-radius:12px;font-size:11px;font-weight:600;}
.badge-green{background:rgba(52,211,153,.12);color:var(--green);}
.badge-yellow{background:rgba(236,200,121,.12);color:var(--gold);}
.badge-red{background:rgba(248,113,113,.12);color:var(--red);}

/* Alerts / activity */
.adm-alert{display:flex;align-items:flex-start;gap:10px;padding:12px 0;border-bottom:1px solid rgba(148,163,184,.05);}
.adm-alert:last-child{border-bottom:none;}
.alert-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;margin-top:4px;}
.alert-msg{font-size:13px;line-height:1.5;}
.alert-time{font-size:11px;color:#475569;margin-top:2px;}

/* Bar chart */
.bar-chart{display:flex;align-items:flex-end;gap:6px;height:80px;margin-top:8px;}
.bar-wrap{flex:1;display:flex;flex-direction:column;align-items:center;gap:4px;}
.bar-col{width:100%;border-radius:4px 4px 0 0;background:linear-gradient(to top,rgba(239,68,68,.6),rgba(255,141,58,.5));min-height:4px;transition:height .5s ease;}
.bar-day{font-size:10px;color:#475569;}

/* Quick action btns */
.qa-row{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:24px;}
.qa-adm{
    background:var(--card);border:1px solid var(--border);border-radius:12px;
    padding:14px;display:flex;align-items:center;gap:12px;
    text-decoration:none;transition:border-color .2s,transform .2s;cursor:pointer;
}
.qa-adm:hover{border-color:rgba(239,68,68,.3);transform:translateY(-1px);}
.qa-adm .qi{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.qa-adm .qi svg{width:17px;height:17px;}
.qa-adm .qt{font-size:13px;font-weight:600;color:#e2e8f0;}
.qa-adm .qs{font-size:11px;color:#475569;}

/* KYC / Pending section */
.pending-item{display:flex;align-items:center;gap:12px;padding:12px 0;border-bottom:1px solid rgba(148,163,184,.05);}
.pending-item:last-child{border-bottom:none;}
</style>

{{-- ── Stat Cards ── --}}
<div class="adm-stats">

    <div class="adm-stat" style="--accent:#ef4444;border-color:rgba(239,68,68,.12);">
        <div class="stat-icon" style="background:rgba(239,68,68,.12);">
            <svg style="color:#f87171;" fill="currentColor" viewBox="0 0 24 24"><path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A2.01 2.01 0 0017.94 6H16v2h1.89l.76 2.27L12 15.21l-6.65-4.94L6.11 8H8V6H5.05c-.83 0-1.55.52-1.85 1.29L.5 16H3v6c0 1.11.89 2 2 2h4c1.11 0 2-.89 2-2v-2h4v2c0 1.11.89 2 2 2h4c1.11 0 2-.89 2-2z"/></svg>
        </div>
        <div class="stat-lbl">Total Users</div>
        <div class="stat-val" style="color:#f87171;">{{ number_format($totalUsers) }}</div>
        <div class="stat-sub up">
            <svg width="11" height="11" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
            +{{ $newUsersWeek }} this week
        </div>
    </div>

    <div class="adm-stat" style="--accent:#ecc879;border-color:rgba(236,200,121,.12);">
        <div class="stat-icon" style="background:rgba(236,200,121,.12);">
            <svg style="color:var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        </div>
        <div class="stat-lbl">New Today</div>
        <div class="stat-val" style="color:var(--gold);">{{ $newUsersToday }}</div>
        <div class="stat-sub" style="color:#64748b;">Registered today</div>
    </div>

    <div class="adm-stat" style="--accent:#34d399;border-color:rgba(52,211,153,.10);">
        <div class="stat-icon" style="background:rgba(52,211,153,.10);">
            <svg style="color:var(--green);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="stat-lbl">Verified Users</div>
        <div class="stat-val" style="color:var(--green);">{{ number_format($verifiedUsers) }}</div>
        <div class="stat-sub up">
            <svg width="11" height="11" fill="currentColor" viewBox="0 0 24 24"><path d="M7 14l5-5 5 5H7z"/></svg>
            {{ $totalUsers > 0 ? round(($verifiedUsers/$totalUsers)*100) : 0 }}% of total
        </div>
    </div>

    <div class="adm-stat" style="--accent:#a78bfa;border-color:rgba(167,139,250,.10);">
        <div class="stat-icon" style="background:rgba(167,139,250,.10);">
            <svg style="color:var(--purple);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="stat-lbl">Est. Revenue</div>
        <div class="stat-val" style="color:var(--purple);">${{ number_format($totalUsers * 99) }}</div>
        <div class="stat-sub" style="color:#64748b;">@ $99/mo per user</div>
    </div>

</div>

{{-- ── Quick Actions ── --}}
<div class="qa-row">
    <a class="qa-adm" href="{{ route('admin.users') }}">
        <div class="qi" style="background:rgba(239,68,68,.1);">
            <svg style="color:#f87171;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div><div class="qt">Manage Users</div><div class="qs">View all accounts</div></div>
    </a>
    <a class="qa-adm" href="#">
        <div class="qi" style="background:rgba(236,200,121,.1);">
            <svg style="color:var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </div>
        <div><div class="qt">Withdrawals</div><div class="qs">3 pending review</div></div>
    </a>
    <a class="qa-adm" href="#">
        <div class="qi" style="background:rgba(52,211,153,.08);">
            <svg style="color:var(--green);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
        </div>
        <div><div class="qt">Promotions</div><div class="qs">Manage banners</div></div>
    </a>
</div>

{{-- ── Users Table + Alerts ── --}}
<div class="adm-2col">

    {{-- Recent Users --}}
    <div class="adm-card">
        <div class="adm-card-header">
            <h2>👥 Recent Registrations</h2>
            <a class="view-all" href="{{ route('admin.users') }}">View All →</a>
        </div>
        <div style="padding:0 8px 8px;">
            <table class="usr-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentUsers as $u)
                    <tr>
                        <td>
                            <div class="usr-info">
                                <div class="usr-avatar">{{ strtoupper(substr($u->name,0,1)) }}</div>
                                <div>
                                    <div class="usr-name">{{ $u->name }}</div>
                                    <div class="usr-email">{{ $u->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="color:#64748b;font-size:12px;">{{ $u->created_at->diffForHumans() }}</td>
                        <td>
                            @if($u->email_verified_at)
                                <span class="badge badge-green">Verified</span>
                            @else
                                <span class="badge badge-yellow">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($u->id === 1)
                                <span class="badge badge-red">Admin</span>
                            @else
                                <span class="badge" style="background:rgba(148,163,184,.08);color:#64748b;">Member</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right column: Growth chart + Alerts --}}
    <div style="display:flex;flex-direction:column;gap:18px;">

        {{-- User Growth Chart --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <h2>📊 7-Day Growth</h2>
                <span style="font-size:11px;color:#475569;">New users</span>
            </div>
            <div class="adm-card-body">
                @php
                    $days = collect();
                    $maxCount = 1;
                    for($i = 6; $i >= 0; $i--) {
                        $date = now()->subDays($i)->format('Y-m-d');
                        $label = now()->subDays($i)->format('D');
                        $count = $userGrowth->get($date, 0);
                        $days->push(['label'=>$label,'count'=>$count]);
                        if($count > $maxCount) $maxCount = $count;
                    }
                @endphp
                <div class="bar-chart">
                    @foreach($days as $day)
                    <div class="bar-wrap">
                        <div class="bar-col" style="height:{{ $maxCount > 0 ? max(4, ($day['count']/$maxCount)*80) : 4 }}px;" title="{{ $day['count'] }} users"></div>
                        <div class="bar-day">{{ $day['label'] }}</div>
                    </div>
                    @endforeach
                </div>
                <div style="margin-top:12px;display:flex;justify-content:space-between;font-size:12px;color:#475569;">
                    <span>Total this week: <strong style="color:#e2e8f0;">{{ $newUsersWeek }}</strong></span>
                    <span>Today: <strong style="color:var(--green);">{{ $newUsersToday }}</strong></span>
                </div>
            </div>
        </div>

        {{-- Admin Alerts --}}
        <div class="adm-card">
            <div class="adm-card-header">
                <h2>🔔 System Alerts</h2>
                <span style="font-size:11px;color:#475569;">Live</span>
            </div>
            <div class="adm-card-body" style="padding-top:6px;padding-bottom:6px;">
                @php
                    $alerts = [
                        ['color'=>'#f87171','msg'=>'3 withdrawal requests pending approval','time'=>'Just now'],
                        ['color'=>'#ecc879','msg'=>'{{ $newUsersToday }} new user(s) registered today','time'=>'Today'],
                        ['color'=>'#34d399','msg'=>'All systems operational — uptime 99.9%','time'=>'Ongoing'],
                        ['color'=>'#a78bfa','msg'=>'Monthly revenue target 68% achieved','time'=>'This month'],
                        ['color'=>'#f87171','msg'=>($verifiedUsers < $totalUsers ? ($totalUsers - $verifiedUsers).' users have unverified emails' : 'All users verified'),'time'=>'Current'],
                    ];
                @endphp
                @foreach($alerts as $a)
                <div class="adm-alert">
                    <div class="alert-dot" style="background:{{ $a['color'] }};"></div>
                    <div>
                        <div class="alert-msg">{{ $a['msg'] }}</div>
                        <div class="alert-time">{{ $a['time'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

{{-- ── Platform Stats ── --}}
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;">
    @php
        $platformStats = [
            ['label'=>'Total Courses','value'=>'10','icon'=>'🎓','change'=>'Active'],
            ['label'=>'Avg Session','value'=>'24m','icon'=>'⏱️','change'=>'Per user'],
            ['label'=>'Support Tickets','value'=>'12','icon'=>'🎫','change'=>'Open'],
        ];
    @endphp
    @foreach($platformStats as $s)
    <div class="adm-card" style="padding:18px 20px;display:flex;align-items:center;gap:14px;">
        <div style="font-size:28px;">{{ $s['icon'] }}</div>
        <div>
            <div style="font-size:11px;color:#475569;text-transform:uppercase;letter-spacing:.1em;margin-bottom:4px;">{{ $s['label'] }}</div>
            <div style="font-size:22px;font-weight:800;color:#e2e8f0;">{{ $s['value'] }}</div>
            <div style="font-size:11px;color:#475569;">{{ $s['change'] }}</div>
        </div>
    </div>
    @endforeach
</div>

</x-admin-layout>
