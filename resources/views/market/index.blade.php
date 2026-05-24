<x-dashboard-layout title="Markets">

<style>
    .market-page { max-width: 1200px; margin: 0 auto; }
    .market-header { margin-bottom: 1.5rem; }
    .market-header h1 { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.25rem; }
    .market-header p { color: #64748b; font-size: 0.9rem; }

    .search-wrap { position: relative; max-width: 420px; }
    .search-wrap input {
        width: 100%; padding: 0.75rem 1rem 0.75rem 2.75rem;
        background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.75rem; color: #f1f5f9; font-size: 0.95rem;
        transition: border-color 0.2s;
    }
    .search-wrap input::placeholder { color: #64748b; }
    .search-wrap input:focus { outline: none; border-color: rgba(201,153,42,0.5); }
    .search-icon { position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: #64748b; pointer-events:none; }
    .search-dropdown {
        display: none; position: absolute; top: calc(100% + 6px); left: 0; right: 0;
        background: #1e2a3a; border: 1px solid rgba(255,255,255,0.1); border-radius: 0.75rem;
        z-index: 99; overflow: hidden; box-shadow: 0 16px 40px rgba(0,0,0,0.5);
    }
    .search-dropdown.open { display: block; }
    .search-item {
        padding: 0.7rem 1rem; cursor: pointer; display: flex; align-items: center;
        gap: 0.75rem; font-size: 0.9rem; transition: background 0.15s;
    }
    .search-item:hover { background: rgba(201,153,42,0.12); }
    .search-item .sym { font-weight: 700; color: #f1f5f9; min-width: 60px; }
    .search-item .name { color: #64748b; font-size: 0.8rem; }

    .controls-row { display: flex; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.25rem; }

    .type-toggle { display: flex; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 0.6rem; overflow: hidden; }
    .type-btn {
        padding: 0.5rem 1.25rem; font-size: 0.85rem; font-weight: 600; cursor: pointer;
        background: transparent; border: none; color: #64748b; transition: all 0.2s;
    }
    .type-btn.active { color: #C9992A; background: rgba(201,153,42,0.12); }

    .quick-assets { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .quick-btn {
        padding: 0.4rem 0.9rem; border-radius: 0.5rem; border: 1px solid rgba(255,255,255,0.1);
        background: transparent; color: #94a3b8; font-size: 0.82rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s;
    }
    .quick-btn:hover { background: rgba(201,153,42,0.1); color: #C9992A; border-color: rgba(201,153,42,0.4); }
    .quick-btn.active { background: rgba(201,153,42,0.15); color: #C9992A; border-color: #C9992A; }

    .asset-bar {
        display: flex; align-items: baseline; gap: 1rem; flex-wrap: wrap;
        padding: 1rem 1.25rem; background: rgba(15,23,42,0.8);
        border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem;
        margin-bottom: 1rem;
    }
    .asset-name { font-size: 1rem; font-weight: 600; color: #94a3b8; }
    .asset-price { font-size: 1.75rem; font-weight: 800; color: #f1f5f9; font-variant-numeric: tabular-nums; }
    .asset-change { font-size: 0.88rem; font-weight: 600; padding: 0.2rem 0.6rem; border-radius: 0.4rem; }
    .change-up   { color: #22c55e; background: rgba(34,197,94,0.12); }
    .change-down { color: #f87171; background: rgba(248,113,113,0.12); }

    .range-toggle { display: flex; gap: 0.4rem; margin-bottom: 0.75rem; }
    .range-btn {
        padding: 0.35rem 0.9rem; border-radius: 0.5rem; border: 1px solid rgba(255,255,255,0.08);
        background: transparent; color: #64748b; font-size: 0.82rem; font-weight: 700;
        cursor: pointer; transition: all 0.2s;
    }
    .range-btn.active { background: #C9992A; color: #050d19; border-color: #C9992A; }

    .chart-card {
        background: #1c1c1e; border: 1px solid rgba(255,255,255,0.06);
        border-radius: 1rem; overflow: hidden; position: relative;
    }
    #tv-chart { width: 100%; height: 460px; }

    .chart-overlay {
        position: absolute; inset: 0; display: none;
        align-items: center; justify-content: center;
        z-index: 20; background: rgba(28,28,30,0.85); backdrop-filter: blur(4px);
        border-radius: 1rem;
    }
    .chart-overlay.visible { display: flex; }
    .spinner {
        width: 36px; height: 36px;
        border: 3px solid rgba(201,153,42,0.25); border-top-color: #C9992A;
        border-radius: 50%; animation: spin 0.9s linear infinite;
    }
    .chart-error-msg {
        display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
        color: #f87171; font-size: 0.95rem; text-align: center; padding: 1rem;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    @media (max-width: 640px) {
        #tv-chart { height: 300px; }
        .asset-price { font-size: 1.35rem; }
    }
</style>

{{-- Load Lightweight Charts v4 (stable API) BEFORE Alpine --}}
<script src="https://unpkg.com/lightweight-charts@4.2.2/dist/lightweight-charts.standalone.production.js"></script>

<div class="market-page">

    {{-- Header --}}
    <div class="market-header" style="display:flex; align-items:flex-start; justify-content:space-between; flex-wrap:wrap; gap:1rem; margin-bottom:1.25rem;">
        <div>
            <h1>Market Charts</h1>
            <p>Live candlestick data for crypto &amp; stocks</p>
        </div>
        <div class="search-wrap">
            <svg class="search-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
            </svg>
            <input id="search-input" type="text" placeholder="Search asset… (e.g. BTC, AAPL)" autocomplete="off">
            <div id="search-dropdown" class="search-dropdown"></div>
        </div>
    </div>

    {{-- Controls --}}
    <div class="controls-row">
        <div class="type-toggle">
            <button class="type-btn active" id="btn-crypto" onclick="switchType('crypto')">Crypto</button>
            <button class="type-btn" id="btn-stock"  onclick="switchType('stock')">Stocks</button>
        </div>
        <div class="quick-assets" id="quick-assets"></div>
    </div>

    {{-- Asset info bar --}}
    <div class="asset-bar">
        <span class="asset-name"  id="asset-name">Bitcoin / USDT</span>
        <span class="asset-price" id="asset-price">—</span>
        <span class="asset-change" id="asset-change" style="display:none;"></span>
    </div>

    {{-- Range toggle --}}
    <div class="range-toggle">
        <button class="range-btn" id="range-1d" onclick="setRange('1d')">1D</button>
        <button class="range-btn active" id="range-1w" onclick="setRange('1w')">1W</button>
        <button class="range-btn" id="range-1m" onclick="setRange('1m')">1M</button>
        <button class="range-btn" id="range-1y" onclick="setRange('1y')">1Y</button>
    </div>

    {{-- Chart --}}
    <div class="chart-card">
        <div id="chart-overlay" class="chart-overlay visible">
            <div class="spinner"></div>
        </div>
        <div id="tv-chart"></div>
    </div>

</div>

<script>
(function() {
    // ── State ──────────────────────────────────────────────
    let state = {
        assetType: 'crypto',
        symbol:    'BTCUSDT',
        assetName: 'Bitcoin / USDT',
        range:     '1w',
    };

    const ASSETS = {
        crypto: [
            { symbol: 'BTCUSDT', name: 'Bitcoin / USDT',  label: 'BTC' },
            { symbol: 'ETHUSDT', name: 'Ethereum / USDT', label: 'ETH' },
            { symbol: 'BNBUSDT', name: 'BNB / USDT',      label: 'BNB' },
            { symbol: 'SOLUSDT', name: 'Solana / USDT',   label: 'SOL' },
        ],
        stock: [
            { symbol: 'AAPL',  name: 'Apple Inc.',      label: 'AAPL'  },
            { symbol: 'TSLA',  name: 'Tesla Inc.',       label: 'TSLA'  },
            { symbol: 'GOOGL', name: 'Alphabet Inc.',    label: 'GOOGL' },
            { symbol: 'AMZN',  name: 'Amazon.com Inc.',  label: 'AMZN'  },
        ],
    };

    // ── Chart setup ───────────────────────────────────────
    let chart        = null;
    let candleSeries = null;

    function initChart() {
        const container = document.getElementById('tv-chart');
        chart = LightweightCharts.createChart(container, {
            width:  container.clientWidth,
            height: 460,
            layout: {
                background: { color: '#1c1c1e' },
                textColor: '#94a3b8',
            },
            grid: {
                vertLines: { color: 'rgba(255,255,255,0.04)' },
                horzLines: { color: 'rgba(255,255,255,0.04)' },
            },
            crosshair: {
                mode: LightweightCharts.CrosshairMode.Normal,
                vertLine: { color: 'rgba(201,153,42,0.5)', labelBackgroundColor: '#C9992A' },
                horzLine: { color: 'rgba(201,153,42,0.5)', labelBackgroundColor: '#C9992A' },
            },
            timeScale: {
                borderColor: 'rgba(255,255,255,0.06)',
                timeVisible: true,
                secondsVisible: false,
            },
            rightPriceScale: { borderColor: 'rgba(255,255,255,0.06)' },
        });

        candleSeries = chart.addCandlestickSeries({
            upColor:        '#22c55e',
            downColor:      '#f87171',
            borderUpColor:   '#22c55e',
            borderDownColor: '#f87171',
            wickUpColor:     '#22c55e',
            wickDownColor:   '#f87171',
        });

        // Responsive resize
        new ResizeObserver(entries => {
            if (entries[0]) chart.applyOptions({ width: entries[0].contentRect.width });
        }).observe(container);
    }

    // ── Overlay helpers ───────────────────────────────────
    function showLoader() {
        const el = document.getElementById('chart-overlay');
        el.classList.add('visible');
        el.innerHTML = '<div class="spinner"></div>';
    }

    function hideLoader() {
        document.getElementById('chart-overlay').classList.remove('visible');
    }

    function showError(msg) {
        const el = document.getElementById('chart-overlay');
        el.classList.add('visible');
        el.innerHTML = `<div class="chart-error-msg">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>${msg}</span>
        </div>`;
    }

    // ── Fetch & render ────────────────────────────────────
    async function fetchData() {
        showLoader();
        try {
            const url = `/market/chart-data?symbol=${state.symbol}&type=${state.assetType}&range=${state.range}`;
            const res  = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
            const data = await res.json();

            if (!res.ok || data.error) {
                showError(data.error || 'Failed to load chart data.');
                return;
            }

            if (!Array.isArray(data) || data.length === 0) {
                showError('No data returned for this symbol/range.');
                return;
            }

            candleSeries.setData(data);
            chart.timeScale().fitContent();
            hideLoader();

            // Update price info
            const last  = data[data.length - 1];
            const first = data[0];
            updatePriceBar(last.close, ((last.close - first.open) / first.open) * 100);

        } catch (e) {
            showError('Network error. Please try again.');
            console.error(e);
        }
    }

    function updatePriceBar(price, changePct) {
        const priceEl  = document.getElementById('asset-price');
        const changeEl = document.getElementById('asset-change');
        const nameEl   = document.getElementById('asset-name');

        nameEl.textContent  = state.assetName;
        priceEl.textContent = '$' + price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 6 });

        changeEl.style.display  = '';
        changeEl.textContent    = (changePct >= 0 ? '+' : '') + changePct.toFixed(2) + '%';
        changeEl.className      = 'asset-change ' + (changePct >= 0 ? 'change-up' : 'change-down');
    }

    // ── Quick assets bar ──────────────────────────────────
    function renderQuickAssets() {
        const container = document.getElementById('quick-assets');
        const assets    = ASSETS[state.assetType];
        container.innerHTML = assets.map(a =>
            `<button class="quick-btn ${a.symbol === state.symbol ? 'active' : ''}"
                onclick="selectAsset('${a.symbol}','${a.name}','${state.assetType}')">${a.label}</button>`
        ).join('');
    }

    // ── Public handlers ───────────────────────────────────
    window.setRange = function(r) {
        state.range = r;
        document.querySelectorAll('.range-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('range-' + r).classList.add('active');
        fetchData();
    };

    window.switchType = function(type) {
        state.assetType = type;
        const first = ASSETS[type][0];
        state.symbol    = first.symbol;
        state.assetName = first.name;

        document.getElementById('btn-crypto').classList.toggle('active', type === 'crypto');
        document.getElementById('btn-stock').classList.toggle('active',  type === 'stock');

        renderQuickAssets();
        fetchData();
    };

    window.selectAsset = function(symbol, name, type) {
        state.symbol    = symbol;
        state.assetName = name;
        state.assetType = type;
        renderQuickAssets();

        // close search
        document.getElementById('search-input').value = '';
        document.getElementById('search-dropdown').classList.remove('open');

        fetchData();
    };

    // ── Search ────────────────────────────────────────────
    const ALL_ASSETS = [...ASSETS.crypto, ...ASSETS.stock];

    const searchInput    = document.getElementById('search-input');
    const searchDropdown = document.getElementById('search-dropdown');

    searchInput.addEventListener('input', function() {
        const q = this.value.toLowerCase().trim();
        if (!q) { searchDropdown.classList.remove('open'); return; }

        const results = ALL_ASSETS.filter(a =>
            a.symbol.toLowerCase().includes(q) || a.name.toLowerCase().includes(q)
        );

        if (!results.length) { searchDropdown.classList.remove('open'); return; }

        const type = a => ASSETS.crypto.find(x => x.symbol === a.symbol) ? 'crypto' : 'stock';
        searchDropdown.innerHTML = results.map(a =>
            `<div class="search-item" onclick="selectAsset('${a.symbol}','${a.name}','${type(a)}')">
                <span class="sym">${a.symbol}</span>
                <span class="name">${a.name}</span>
            </div>`
        ).join('');
        searchDropdown.classList.add('open');
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.search-wrap')) searchDropdown.classList.remove('open');
    });

    // ── Boot ──────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {
        initChart();
        renderQuickAssets();
        fetchData();
    });

})();
</script>

</x-dashboard-layout>
