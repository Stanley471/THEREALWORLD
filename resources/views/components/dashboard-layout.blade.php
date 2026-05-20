<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Dashboard' }} — The Real World</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --bg-base:      #050d19;
                --bg-surface:   #081426;
                --bg-panel:     rgba(15, 23, 42, 0.82);
                --border:       rgba(148,163,184,0.10);
                --gold:         #ecc879;
                --gold-bright:  #FFCF23;
                --orange:       #FF8D3A;
                --text-primary: #f1f5f9;
                --text-muted:   #64748b;
                --sidebar-w:    260px;
            }

            * { box-sizing: border-box; margin: 0; padding: 0; }

            body {
                font-family: 'Figtree', sans-serif;
                background: var(--bg-base);
                color: var(--text-primary);
                min-height: 100vh;
                antialiased: true;
            }

            /* ── Sidebar ── */
            #sidebar {
                position: fixed;
                top: 0; left: 0; bottom: 0;
                width: var(--sidebar-w);
                background: var(--bg-panel);
                border-right: 1px solid var(--border);
                backdrop-filter: blur(24px);
                display: flex;
                flex-direction: column;
                z-index: 50;
                transition: transform .3s ease;
            }

            #sidebar .sidebar-logo {
                padding: 28px 24px 20px;
                border-bottom: 1px solid var(--border);
                display: flex;
                align-items: center;
                gap: 12px;
            }

            #sidebar .sidebar-logo img { height: 36px; width: auto; }

            #sidebar nav {
                flex: 1;
                padding: 20px 12px;
                overflow-y: auto;
            }

            #sidebar nav .nav-section-label {
                font-size: 10px;
                letter-spacing: .18em;
                text-transform: uppercase;
                color: var(--text-muted);
                padding: 0 12px;
                margin: 16px 0 6px;
            }

            #sidebar nav a {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 14px;
                border-radius: 10px;
                font-size: 14px;
                font-weight: 500;
                color: #94a3b8;
                text-decoration: none;
                transition: background .15s, color .15s;
                margin-bottom: 2px;
            }

            #sidebar nav a svg { width: 18px; height: 18px; flex-shrink: 0; }

            #sidebar nav a:hover {
                background: rgba(236,200,121,.08);
                color: var(--gold);
            }

            #sidebar nav a.active {
                background: linear-gradient(135deg, rgba(236,200,121,.18), rgba(255,141,58,.12));
                color: var(--gold);
                border: 1px solid rgba(236,200,121,.18);
            }

            .sidebar-footer {
                padding: 16px 12px;
                border-top: 1px solid var(--border);
            }

            .sidebar-footer .user-card {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 10px 12px;
                border-radius: 12px;
                background: rgba(255,255,255,.04);
                cursor: pointer;
                transition: background .15s;
            }

            .sidebar-footer .user-card:hover { background: rgba(255,255,255,.08); }

            .avatar {
                width: 36px; height: 36px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--gold), var(--orange));
                display: flex; align-items: center; justify-content: center;
                font-weight: 700; font-size: 14px; color: #050d19;
                flex-shrink: 0;
            }

            .user-info .name { font-size: 13px; font-weight: 600; color: #e2e8f0; }
            .user-info .email { font-size: 11px; color: var(--text-muted); }

            /* ── Main ── */
            #main-content {
                margin-left: var(--sidebar-w);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* ── Top Bar ── */
            #topbar {
                position: sticky; top: 0; z-index: 40;
                height: 64px;
                background: rgba(5,13,25,.85);
                border-bottom: 1px solid var(--border);
                backdrop-filter: blur(20px);
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 28px;
            }

            #topbar .topbar-left { display: flex; align-items: center; gap: 14px; }

            #topbar .page-title {
                font-size: 18px;
                font-weight: 700;
                background: linear-gradient(90deg, var(--gold), var(--orange));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            #topbar .topbar-right { display: flex; align-items: center; gap: 12px; }

            .icon-btn {
                width: 38px; height: 38px;
                border-radius: 10px;
                background: rgba(255,255,255,.05);
                border: 1px solid var(--border);
                display: flex; align-items: center; justify-content: center;
                color: #94a3b8;
                cursor: pointer;
                transition: background .15s, color .15s;
                position: relative;
            }
            .icon-btn:hover { background: rgba(236,200,121,.1); color: var(--gold); }
            .icon-btn svg { width: 16px; height: 16px; }

            .notif-dot {
                position: absolute; top: 7px; right: 7px;
                width: 7px; height: 7px;
                border-radius: 50%;
                background: var(--gold);
                border: 1.5px solid var(--bg-base);
            }

            /* ── Page ── */
            .page-body {
                flex: 1;
                padding: 28px;
                background: radial-gradient(ellipse at top left, rgba(236,200,121,.05), transparent 40%),
                            radial-gradient(ellipse at bottom right, rgba(255,141,58,.04), transparent 40%);
            }

            /* ── Mobile overlay ── */
            #sidebar-overlay {
                display: none;
                position: fixed; inset: 0;
                background: rgba(0,0,0,.6);
                z-index: 45;
            }

            #mobile-toggle {
                display: none;
                background: none; border: none;
                color: #94a3b8; cursor: pointer; padding: 4px;
            }
            #mobile-toggle svg { width: 22px; height: 22px; }

            @media (max-width: 768px) {
                #sidebar { transform: translateX(-100%); }
                #sidebar.open { transform: translateX(0); }
                #sidebar-overlay.open { display: block; }
                #main-content { margin-left: 0; }
                #mobile-toggle { display: flex; }
                .page-body { padding: 20px 16px; }
            }
        </style>
    </head>
    <body>

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.webp') }}" alt="The Real World" onerror="this.style.display='none'">
                <span style="font-size:15px;font-weight:700;color:#e2e8f0;letter-spacing:.02em;">The Real World</span>
            </div>

            <nav>
                <p class="nav-section-label">Main</p>

                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    Portfolio
                </a>

                <a href="#">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Markets
                </a>

                <a href="#">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    Trade
                </a>

                <p class="nav-section-label">Learning</p>

                <a href="#">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Courses
                </a>

                <a href="{{ route('community') }}" class="{{ request()->routeIs('community') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Community
                </a>

                <p class="nav-section-label">Account</p>

                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profile
                </a>

                <a href="{{ route('settings.index') }}" class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Settings
                </a>

                @if(Auth::user()->id === 1 || (method_exists(Auth::user(), 'hasRole') && Auth::user()->hasRole('admin')))
                <a href="{{ route('admin.dashboard') }}" style="margin-top:8px;background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.15);color:#f87171 !important;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Admin Panel
                </a>
                @endif
            </nav>

            <div class="sidebar-footer">
                <div class="user-card">
                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <div class="user-info">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="email">{{ Str::limit(Auth::user()->email, 22) }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin-top:8px;">
                    @csrf
                    <button type="submit" style="width:100%;padding:9px 14px;border-radius:10px;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.2);color:#f87171;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:8px;justify-content:center;transition:background .15s;" onmouseover="this.style.background='rgba(239,68,68,.2)'" onmouseout="this.style.background='rgba(239,68,68,.1)'">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Sidebar overlay (mobile) -->
        <div id="sidebar-overlay" onclick="closeSidebar()"></div>

        <!-- Main Content -->
        <div id="main-content">
            <!-- Top Bar -->
            <header id="topbar">
                <div class="topbar-left">
                    <button id="mobile-toggle" onclick="toggleSidebar()">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <span class="page-title">{{ $title ?? 'Dashboard' }}</span>
                </div>
                <div class="topbar-right">
                    <!-- Notifications -->
                    <div class="icon-btn" title="Notifications">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="notif-dot"></span>
                    </div>
                    <!-- Avatar -->
                    <div class="avatar" style="width:34px;height:34px;font-size:13px;cursor:pointer;" title="{{ Auth::user()->name }}">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="page-body">
                {{ $slot }}
            </main>
        </div>

        <script>
            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('open');
                document.getElementById('sidebar-overlay').classList.toggle('open');
            }
            function closeSidebar() {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('sidebar-overlay').classList.remove('open');
            }
        </script>
    </body>
</html>
