<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Admin' }} — TRW Admin</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root{
                --bg:#04080f;
                --surface:rgba(10,16,28,.90);
                --border:rgba(148,163,184,.09);
                --gold:#ecc879;
                --orange:#FF8D3A;
                --red:#f87171;
                --green:#34d399;
                --purple:#a78bfa;
                --sidebar:240px;
            }
            *{box-sizing:border-box;margin:0;padding:0;}
            body{font-family:'Figtree',sans-serif;background:var(--bg);color:#e2e8f0;min-height:100vh;}

            /* Sidebar */
            #adm-sidebar{
                position:fixed;top:0;left:0;bottom:0;width:var(--sidebar);
                background:var(--surface);
                border-right:1px solid var(--border);
                backdrop-filter:blur(24px);
                display:flex;flex-direction:column;z-index:50;
                transition:transform .3s ease;
            }
            .adm-logo{
                padding:22px 20px 18px;
                border-bottom:1px solid var(--border);
                display:flex;align-items:center;gap:10px;
            }
            .adm-logo .logo-badge{
                width:34px;height:34px;border-radius:9px;
                background:linear-gradient(135deg,var(--gold),var(--orange));
                display:flex;align-items:center;justify-content:center;
                font-weight:800;font-size:14px;color:#04080f;flex-shrink:0;
            }
            .adm-logo .logo-text{font-size:14px;font-weight:700;color:#e2e8f0;}
            .adm-logo .logo-sub{font-size:10px;color:#ef4444;font-weight:700;letter-spacing:.12em;text-transform:uppercase;}

            #adm-sidebar nav{flex:1;padding:16px 10px;overflow-y:auto;}
            .nav-label{font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:#475569;padding:0 10px;margin:14px 0 5px;}
            #adm-sidebar nav a{
                display:flex;align-items:center;gap:10px;
                padding:9px 12px;border-radius:9px;
                font-size:13.5px;font-weight:500;color:#94a3b8;
                text-decoration:none;margin-bottom:1px;
                transition:background .15s,color .15s;
            }
            #adm-sidebar nav a svg{width:16px;height:16px;flex-shrink:0;}
            #adm-sidebar nav a:hover{background:rgba(236,200,121,.08);color:var(--gold);}
            #adm-sidebar nav a.active{
                background:linear-gradient(135deg,rgba(236,200,121,.16),rgba(255,141,58,.10));
                color:var(--gold);
                border:1px solid rgba(236,200,121,.16);
            }
            .nav-badge{
                margin-left:auto;padding:1px 7px;border-radius:10px;
                font-size:11px;font-weight:700;
                background:rgba(239,68,68,.15);color:#f87171;
            }

            .adm-footer{padding:14px 10px;border-top:1px solid var(--border);}
            .adm-user{
                display:flex;align-items:center;gap:10px;
                padding:8px 10px;border-radius:10px;
                background:rgba(255,255,255,.04);
            }
            .adm-avatar{
                width:32px;height:32px;border-radius:50%;
                background:linear-gradient(135deg,#ef4444,#f97316);
                display:flex;align-items:center;justify-content:center;
                font-weight:700;font-size:13px;color:#fff;flex-shrink:0;
            }
            .adm-user .un{font-size:12px;font-weight:600;color:#e2e8f0;}
            .adm-user .ur{font-size:10px;color:#ef4444;font-weight:700;letter-spacing:.08em;}

            /* Main */
            #adm-main{margin-left:var(--sidebar);min-height:100vh;display:flex;flex-direction:column;}

            /* Topbar */
            #adm-top{
                position:sticky;top:0;z-index:40;height:60px;
                background:rgba(4,8,15,.88);
                border-bottom:1px solid var(--border);
                backdrop-filter:blur(20px);
                display:flex;align-items:center;justify-content:space-between;
                padding:0 24px;
            }
            .adm-page-title{
                font-size:16px;font-weight:700;
                background:linear-gradient(90deg,#ef4444,var(--orange));
                -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
            }
            .adm-top-right{display:flex;align-items:center;gap:10px;}
            .adm-pill{
                display:inline-flex;align-items:center;gap:6px;
                padding:5px 12px;border-radius:20px;
                background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.2);
                font-size:11px;font-weight:700;color:#f87171;letter-spacing:.08em;
            }
            .adm-pill span{width:6px;height:6px;border-radius:50%;background:#ef4444;display:inline-block;animation:pulse 2s infinite;}
            @keyframes pulse{0%,100%{opacity:1;}50%{opacity:.4;}}

            .adm-icon-btn{
                width:36px;height:36px;border-radius:9px;
                background:rgba(255,255,255,.05);border:1px solid var(--border);
                display:flex;align-items:center;justify-content:center;
                color:#94a3b8;cursor:pointer;transition:background .15s,color .15s;position:relative;
            }
            .adm-icon-btn:hover{background:rgba(239,68,68,.1);color:#f87171;}
            .adm-icon-btn svg{width:15px;height:15px;}
            .notif-dot{position:absolute;top:6px;right:6px;width:6px;height:6px;border-radius:50%;background:#ef4444;border:1.5px solid var(--bg);}

            .adm-body{
                flex:1;padding:24px;
                background:
                    radial-gradient(ellipse at top left,rgba(239,68,68,.04),transparent 40%),
                    radial-gradient(ellipse at bottom right,rgba(255,141,58,.03),transparent 40%);
            }

            /* Responsive */
            #adm-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:45;}
            #adm-toggle{display:none;background:none;border:none;color:#94a3b8;cursor:pointer;padding:4px;}
            #adm-toggle svg{width:22px;height:22px;}
            @media(max-width:768px){
                #adm-sidebar{transform:translateX(-100%);}
                #adm-sidebar.open{transform:translateX(0);}
                #adm-overlay.open{display:block;}
                #adm-main{margin-left:0;}
                #adm-toggle{display:flex;}
                .adm-body{padding:16px;}
            }
        </style>
    </head>
    <body>

    <aside id="adm-sidebar">
        <div class="adm-logo">
            <div class="logo-badge">A</div>
            <div>
                <div class="logo-text">The Real World</div>
                <div class="logo-sub">Admin Panel</div>
            </div>
        </div>

        <nav>
            <p class="nav-label">Overview</p>

            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Users
                <span class="nav-badge">{{ \App\Models\User::count() }}</span>
            </a>

            <p class="nav-label">Finance</p>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Transactions
            </a>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                Withdrawals
                <span class="nav-badge">3</span>
            </a>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Revenue
            </a>

            <p class="nav-label">Platform</p>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Courses
            </a>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                Promotions
            </a>

            <a href="#">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
        </nav>

        <div class="adm-footer">
            <div class="adm-user">
                <div class="adm-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <div class="un">{{ Auth::user()->name }}</div>
                    <div class="ur">● Administrator</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-top:8px;">
                @csrf
                <button type="submit" style="width:100%;padding:8px;border-radius:8px;background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.15);color:#f87171;font-size:12px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px;justify-content:center;transition:background .15s;" onmouseover="this.style.background='rgba(239,68,68,.18)'" onmouseout="this.style.background='rgba(239,68,68,.08)'">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign Out
                </button>
            </form>

            <a href="{{ route('dashboard') }}" style="display:flex;align-items:center;gap:6px;margin-top:6px;padding:8px;border-radius:8px;background:rgba(236,200,121,.06);border:1px solid rgba(236,200,121,.12);color:var(--gold);font-size:12px;font-weight:600;text-decoration:none;justify-content:center;transition:background .15s;" onmouseover="this.style.background='rgba(236,200,121,.12)'" onmouseout="this.style.background='rgba(236,200,121,.06)'">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                User Dashboard
            </a>
        </div>
    </aside>

    <div id="adm-overlay" onclick="closeAdm()"></div>

    <div id="adm-main">
        <header id="adm-top">
            <div style="display:flex;align-items:center;gap:12px;">
                <button id="adm-toggle" onclick="toggleAdm()">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <span class="adm-page-title">{{ $title ?? 'Admin Dashboard' }}</span>
            </div>
            <div class="adm-top-right">
                <div class="adm-pill"><span></span> ADMIN</div>
                <div class="adm-icon-btn" title="Alerts">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="notif-dot"></span>
                </div>
                <div class="adm-avatar" style="cursor:pointer;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            </div>
        </header>

        <main class="adm-body">
            {{ $slot }}
        </main>
    </div>

    <script>
        function toggleAdm(){document.getElementById('adm-sidebar').classList.toggle('open');document.getElementById('adm-overlay').classList.toggle('open');}
        function closeAdm(){document.getElementById('adm-sidebar').classList.remove('open');document.getElementById('adm-overlay').classList.remove('open');}
    </script>
    </body>
</html>
