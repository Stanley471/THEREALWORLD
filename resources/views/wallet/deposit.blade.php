@php
    $openCrypto = old('payment_method') === 'crypto';
    $openCard = old('payment_method') === 'card';
@endphp

<x-dashboard-layout title="Add Funds">
    <style>
        .container { max-width: 1200px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2.5rem; }
        .page-header h1 { font-size: 2.75rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }

        .methods-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
            margin-bottom: 2rem;
            align-items: start;
        }
        @media (min-width: 900px) {
            .methods-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.5rem; }
        }

        .method-panel {
            background: rgba(15,23,42,0.85);
            border: 1px solid rgba(148,163,184,0.12);
            border-radius: 1rem;
            overflow: hidden;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .method-panel.crypto { border-color: rgba(255,160,35,0.25); }
        .method-panel.card-pay { border-color: rgba(151,0,8,0.35); }
        .method-panel.is-open.crypto { border-color: #ffa023; box-shadow: 0 8px 32px rgba(255,141,58,0.12); }
        .method-panel.is-open.card-pay { border-color: #ef4444; box-shadow: 0 8px 32px rgba(239,68,68,0.12); }

        .method-toggle {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            color: inherit;
        }
        .method-toggle:hover { background: rgba(255,255,255,0.03); }

        .method-toggle-main { display: flex; flex-direction: column; gap: 0.35rem; min-width: 0; }
        .method-toggle .plan-name {
            font-size: 1.25rem;
            font-weight: 800;
            text-transform: uppercase;
            margin: 0;
        }
        .method-panel.crypto .plan-name {
            background: linear-gradient(109.78deg, #FFFFFF -13.37%, #FFCF23 38.96%, #FF8D3A 138.03%);
            background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .method-panel.card-pay .plan-name {
            background: linear-gradient(109.78deg, #FFFFFF -13.37%, #f87171 38.96%, #dc2626 138.03%);
            background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .method-summary { font-size: 0.9rem; color: rgba(226,232,240,0.65); margin: 0; }

        .method-body {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 0.35s ease;
        }
        .method-panel.is-open .method-body { grid-template-rows: 1fr; }
        .method-body-inner {
            overflow: hidden;
            padding: 0 1.5rem;
        }
        .method-panel.is-open .method-body-inner {
            padding-bottom: 1.5rem;
        }

        .method-divider {
            height: 1px;
            background: rgba(148,163,184,0.12);
            margin: 0 1.5rem 1.25rem;
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        .method-panel.is-open .method-divider { opacity: 1; }

        .features { display: grid; gap: 0.75rem; margin-bottom: 1.25rem; }
        .feature-item { display: flex; align-items: flex-start; gap: 0.75rem; color: rgba(226,232,240,0.88); font-size: 0.9rem; }
        .feature-icon { width: 16px; height: 16px; margin-top: 2px; color: #29E517; flex-shrink: 0; }

        .deposit-form { display: flex; flex-direction: column; gap: 1.25rem; margin: 0; padding: 0; }
        .deposit-form .input-group { display: flex; flex-direction: column; gap: 0.5rem; margin: 0; }
        .deposit-form .input-group label {
            font-size: 0.875rem; font-weight: 500; color: rgba(226,232,240,0.88); margin: 0;
        }
        .deposit-form .input-group input {
            width: 100%; margin: 0; padding: 0.85rem 1rem; border-radius: 0.75rem;
            border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.05);
            color: #f1f5f9; font-size: 0.95rem; box-sizing: border-box;
        }
        .deposit-form .input-group select {
            width: 100%; margin: 0; padding: 0.85rem 2.75rem 0.85rem 1rem; border-radius: 0.75rem;
            border: 1px solid rgba(255,255,255,0.12); background-color: #0f172a;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 0.85rem center; background-size: 1.1rem;
            color: #f1f5f9; font-size: 0.95rem; box-sizing: border-box; cursor: pointer;
            appearance: none; -webkit-appearance: none; color-scheme: dark;
        }
        .deposit-form .input-group select option { background-color: #0f172a; color: #f1f5f9; }
        .deposit-form .input-group input::placeholder { color: rgba(255,255,255,0.4); }
        .deposit-form .input-group input:focus,
        .deposit-form .input-group select:focus { outline: none; border-color: rgba(255,141,58,0.45); box-shadow: 0 0 0 3px rgba(255,141,58,0.12); }
        .method-panel.card-pay .deposit-form .input-group input:focus,
        .method-panel.card-pay .deposit-form .input-group select:focus { border-color: rgba(239,68,68,0.45); box-shadow: 0 0 0 3px rgba(239,68,68,0.12); }
        .deposit-form .card-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .deposit-form .form-actions { margin-top: 0.25rem; padding-top: 0.75rem; border-top: 1px solid rgba(148,163,184,0.1); }
        .plan-button {
            width: 100%; border-radius: 0.85rem; padding: 1rem 1.25rem; font-weight: 700;
            border: none; cursor: pointer; transition: transform 0.2s ease;
        }
        .plan-button.crypto { background: #FF8D3A; color: #050d19; }
        .plan-button.crypto:hover { transform: translateY(-2px); }
        .plan-button.card-pay { background: linear-gradient(135deg, #dc2626, #ef4444); color: #fff; }
        .plan-button.card-pay:hover { transform: translateY(-2px); }
        .method-note { font-size: 0.85rem; color: rgba(226,232,240,0.55); margin: 1rem 0 0; line-height: 1.5; }
        .footer-text { color: rgba(226,232,240,0.6); margin-top: 1.5rem; text-align: center; font-size: 0.95rem; }
        @media (max-width: 480px) { .deposit-form .card-row { grid-template-columns: 1fr; } }
    </style>

    <div class="container">
        @if(session('error'))
            <div style="background: rgba(248, 113, 113, 0.1); border: 1px solid rgba(248, 113, 113, 0.3); padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; color: #f87171; font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div style="background: rgba(248, 113, 113, 0.1); border: 1px solid rgba(248, 113, 113, 0.3); padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; color: #f87171; font-size: 14px;">
                <ul style="margin:0;padding-left:1.1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-header">
            <h1>Add Funds</h1>
            <p>Choose a payment method below to fund your account.</p>
        </div>

        <div class="methods-grid">
            {{-- Crypto panel --}}
            <div class="method-panel crypto {{ $openCrypto ? 'is-open' : '' }}" id="panel-crypto">
                <button type="button" class="method-toggle" aria-expanded="{{ $openCrypto ? 'true' : 'false' }}" aria-controls="body-crypto" data-target="panel-crypto">
                    <div class="method-toggle-main">
                        <span class="plan-name">Crypto Deposit</span>
                        <p class="method-summary">BTC, ETH, USDC, USDT, SOL · Min $100</p>
                    </div>
                </button>
                <div class="method-divider"></div>
                <div class="method-body" id="body-crypto">
                    <div class="method-body-inner">
                        <div class="features">
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Multiple cryptocurrencies supported</span>
                            </div>
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Wallet address provided after continuing · 30 min window</span>
                            </div>
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Admin review before wallet is credited</span>
                            </div>
                        </div>

                        <form class="deposit-form" method="POST" action="{{ route('wallet.store.deposit') }}">
                            @csrf
                            <input type="hidden" name="payment_method" value="crypto" />
                            <div class="input-group">
                                <label for="crypto_amount">Deposit Amount (USD)</label>
                                <input id="crypto_amount" name="amount" type="number" step="0.01" min="100" placeholder="Minimum $100.00" value="{{ old('payment_method') === 'crypto' ? old('amount') : '' }}" {{ $openCrypto ? 'required' : '' }} />
                            </div>
                            <div class="input-group">
                                <label for="currency">Cryptocurrency</label>
                                <select id="currency" name="currency" {{ $openCrypto ? 'required' : '' }}>
                                    @foreach($currencies as $code => $currency)
                                        <option value="{{ $code }}" @selected(old('currency') === $code)>{{ $currency['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <label for="crypto_description">Description</label>
                                <input id="crypto_description" name="description" type="text" placeholder="Deposit note (optional)" value="{{ old('payment_method') === 'crypto' ? old('description') : '' }}" />
                            </div>
                            <div class="form-actions">
                                <button class="plan-button crypto" type="submit">Continue to Crypto Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Card panel --}}
            <div class="method-panel card-pay {{ $openCard ? 'is-open' : '' }}" id="panel-card">
                <button type="button" class="method-toggle" aria-expanded="{{ $openCard ? 'true' : 'false' }}" aria-controls="body-card" data-target="panel-card">
                    <div class="method-toggle-main">
                        <span class="plan-name">Card Payment</span>
                        <p class="method-summary">Visa, Mastercard, Amex · Min $100</p>
                    </div>
                </button>
                <div class="method-divider"></div>
                <div class="method-body" id="body-card">
                    <div class="method-body-inner">
                        <div class="features">
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Debit and credit cards accepted</span>
                            </div>
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Review payment details before submitting</span>
                            </div>
                            <div class="feature-item">
                                <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>Admin review before wallet is credited</span>
                            </div>
                        </div>

                        <form class="deposit-form" method="POST" action="{{ route('wallet.store.deposit') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="payment_method" value="card" />
                            <div class="input-group">
                                <label for="card_amount">Deposit Amount (USD)</label>
                                <input id="card_amount" name="amount" type="number" step="0.01" min="100" placeholder="Minimum $100.00" value="{{ old('payment_method') === 'card' ? old('amount') : '' }}" {{ $openCard ? 'required' : '' }} />
                            </div>
                            <div class="input-group">
                                <label for="cardholder_name">Cardholder Name</label>
                                <input id="cardholder_name" name="cardholder_name" type="text" placeholder="Name on card" value="{{ old('cardholder_name') }}" autocomplete="off" {{ $openCard ? 'required' : '' }} />
                            </div>
                            <div class="input-group">
                                <label for="card_number">Card Number</label>
                                <input id="card_number" name="card_number" type="text" inputmode="numeric" autocomplete="off" placeholder="1234 5678 9012 3456" value="{{ old('card_number') }}" {{ $openCard ? 'required' : '' }} />
                            </div>
                            <div class="card-row">
                                <div class="input-group">
                                    <label for="card_expiry">Expiry (MM/YY)</label>
                                    <input id="card_expiry" name="card_expiry" type="text" placeholder="MM/YY" maxlength="5" value="{{ old('card_expiry') }}" autocomplete="off" {{ $openCard ? 'required' : '' }} />
                                </div>
                                <div class="input-group">
                                    <label for="card_cvv">CVV</label>
                                    <input id="card_cvv" name="card_cvv" type="password" inputmode="numeric" autocomplete="off" placeholder="123" maxlength="4" {{ $openCard ? 'required' : '' }} />
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="card_description">Description</label>
                                <input id="card_description" name="description" type="text" placeholder="Deposit note (optional)" value="{{ old('payment_method') === 'card' ? old('description') : '' }}" />
                            </div>
                            <div class="form-actions">
                                <button class="plan-button card-pay" type="submit">Continue to Card Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        (function () {
            const panels = document.querySelectorAll('.method-panel');

            function setPanelFields(panel, enabled) {
                panel.querySelectorAll('form input, form select').forEach(function (el) {
                    if (el.type === 'hidden') return;
                    if (enabled) {
                        if (el.dataset.wasRequired === '1') el.required = true;
                    } else {
                        if (el.required) {
                            el.dataset.wasRequired = '1';
                            el.required = false;
                        }
                    }
                });
            }

            function openPanel(panel) {
                panels.forEach(function (p) {
                    const isTarget = p === panel;
                    p.classList.toggle('is-open', isTarget);
                    const toggle = p.querySelector('.method-toggle');
                    if (toggle) toggle.setAttribute('aria-expanded', isTarget ? 'true' : 'false');
                    setPanelFields(p, isTarget);
                });
            }

            panels.forEach(function (panel) {
                setPanelFields(panel, panel.classList.contains('is-open'));

                panel.querySelector('.method-toggle')?.addEventListener('click', function () {
                    if (panel.classList.contains('is-open')) {
                        panel.classList.remove('is-open');
                        this.setAttribute('aria-expanded', 'false');
                        setPanelFields(panel, false);
                    } else {
                        openPanel(panel);
                    }
                });
            });
        })();
    </script>
</x-dashboard-layout>
