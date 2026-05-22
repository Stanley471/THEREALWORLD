<x-dashboard-layout title="Add Funds">
    <style>
        .container { max-width: 1200px; margin: 0 auto; }
        .page-header { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2.5rem; }
        .page-header h1 { font-size: 2.75rem; margin: 0; }
        .page-header p { color: rgba(226,232,240,0.8); max-width: 700px; }
        .plans-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem; }
        @media (min-width: 1024px) { .plans-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 3rem; } }
        .plan-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.75rem; display: flex; flex-direction: column; gap: 1.5rem; position: relative; }
        .plan-card.crypto { border-color: #ffa023; }
        .plan-card.card-pay { border-color: #970008; }
        .plan-header { margin-bottom: 1rem; }
        .plan-name { font-size: 1.5rem; font-weight: 800; text-transform: uppercase; background: linear-gradient(109.78deg, #FFFFFF -13.37%, #FFCF23 38.96%, #FF8D3A 138.03%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .plan-card.card-pay .plan-name { background: linear-gradient(109.78deg, #FFFFFF -13.37%, #f87171 38.96%, #dc2626 138.03%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .plan-price { font-size: 3rem; font-weight: 800; margin-bottom: 0.25rem; }
        .plan-price-period { color: rgba(226,232,240,0.76); text-transform: uppercase; font-size: 0.95rem; }
        .features { display: grid; gap: 1rem; }
        .feature-item { display: flex; align-items: flex-start; gap: 0.75rem; color: rgba(226,232,240,0.9); }
        .feature-icon { width: 16px; height: 16px; margin-top: 3px; color: #29E517; }
        .plan-button { border-radius: 0.85rem; padding: 1rem 1.25rem; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; border: 1px solid transparent; transition: transform 0.2s ease, background 0.2s ease; width: 100%; cursor: pointer; }
        .plan-button.crypto { background: #FF8D3A; color: #050d19; }
        .plan-button.crypto:hover { transform: translateY(-2px); }
        .plan-button.card-pay { background: linear-gradient(135deg, #dc2626, #ef4444); color: #fff; }
        .plan-button.card-pay:hover { transform: translateY(-2px); }
        .input-group { display: grid; gap: 0.5rem; }
        .input-group label { font-size: 0.9rem; color: rgba(226,232,240,0.75); }
        .input-group input, .input-group select { width: 100%; padding: 0.95rem 1rem; border-radius: 0.85rem; border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.05); color: white; }
        .input-group input::placeholder { color: rgba(255,255,255,0.45); }
        .card-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
        .crypto-note, .footer-text { color: rgba(226,232,240,0.6); font-size: 0.95rem; }
        .footer-text { margin-top: 1.5rem; text-align: center; }
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
            <p>Fund your wallet with cryptocurrency or card. All deposits are reviewed before your balance is updated.</p>
        </div>

        <div class="plans-grid">
            <div class="plan-card crypto">
                <div class="plan-header">
                    <div class="plan-name">Crypto Deposit</div>
                    <div class="plan-price">
                        <span class="plan-price-currency">$</span>—<span class="plan-price-period"> / flexible</span>
                    </div>
                </div>

                <div class="features">
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>BTC, ETH, USDC, USDT, SOL</span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>Wallet address + 30 min payment window</span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>Manual admin confirmation</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('wallet.store.deposit') }}">
                    @csrf
                    <input type="hidden" name="payment_method" value="crypto" />
                    <div class="input-group">
                        <label for="crypto_amount">Deposit Amount (USD)</label>
                        <input id="crypto_amount" name="amount" type="number" step="0.01" min="0.01" placeholder="Enter USD amount" value="{{ old('payment_method') === 'crypto' ? old('amount') : '' }}" required />
                    </div>
                    <div class="input-group">
                        <label for="currency">Cryptocurrency</label>
                        <select id="currency" name="currency" required>
                            @foreach($currencies as $code => $currency)
                                <option value="{{ $code }}" @selected(old('currency') === $code)>{{ $currency['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="crypto_description">Description</label>
                        <input id="crypto_description" name="description" type="text" placeholder="Deposit note (optional)" value="{{ old('payment_method') === 'crypto' ? old('description') : '' }}" />
                    </div>
                    <button class="plan-button crypto" type="submit">Continue to Crypto Payment</button>
                </form>
            </div>

            <div class="plan-card card-pay">
                <div class="plan-header">
                    <div class="plan-name">Card Payment</div>
                    <div class="plan-price">
                        <span class="plan-price-currency">$</span>—<span class="plan-price-period"> / flexible</span>
                    </div>
                </div>

                <div class="features">
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>Visa, Mastercard, Amex</span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>Secure card checkout flow</span>
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        <span>Manual admin confirmation</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('wallet.store.deposit') }}">
                    @csrf
                    <input type="hidden" name="payment_method" value="card" />
                    <div class="input-group">
                        <label for="card_amount">Deposit Amount (USD)</label>
                        <input id="card_amount" name="amount" type="number" step="0.01" min="0.01" placeholder="Enter USD amount" value="{{ old('payment_method') === 'card' ? old('amount') : '' }}" required />
                    </div>
                    <div class="input-group">
                        <label for="cardholder_name">Cardholder Name</label>
                        <input id="cardholder_name" name="cardholder_name" type="text" placeholder="Name on card" value="{{ old('cardholder_name') }}" required />
                    </div>
                    <div class="input-group">
                        <label for="card_number">Card Number</label>
                        <input id="card_number" name="card_number" type="text" inputmode="numeric" autocomplete="cc-number" placeholder="1234 5678 9012 3456" value="{{ old('card_number') }}" required />
                    </div>
                    <div class="card-row">
                        <div class="input-group">
                            <label for="card_expiry">Expiry (MM/YY)</label>
                            <input id="card_expiry" name="card_expiry" type="text" placeholder="MM/YY" maxlength="5" value="{{ old('card_expiry') }}" required />
                        </div>
                        <div class="input-group">
                            <label for="card_cvv">CVV</label>
                            <input id="card_cvv" name="card_cvv" type="password" inputmode="numeric" autocomplete="cc-csc" placeholder="123" maxlength="4" required />
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="card_description">Description</label>
                        <input id="card_description" name="description" type="text" placeholder="Deposit note (optional)" value="{{ old('payment_method') === 'card' ? old('description') : '' }}" />
                    </div>
                    <button class="plan-button card-pay" type="submit">Continue to Card Payment</button>
                </form>

                <p class="crypto-note">Card details are saved securely for admin payment verification.</p>
            </div>
        </div>

        <div class="footer-text">Deposits require admin approval before your wallet balance is updated.</div>
    </div>
</x-dashboard-layout>
