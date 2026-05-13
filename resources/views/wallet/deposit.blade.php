<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deposit Crypto | The Real World</title>
        <meta name="description" content="Deposit funds into your wallet using cryptocurrency. Card payments are currently unavailable.">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background: #02040E;
                color: white;
                line-height: 1.5;
            }
            main {
                width: 100%;
                min-height: 100vh;
                position: relative;
                padding: 2rem 1rem;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
            }
            .header {
                text-align: center;
                margin-bottom: 3rem;
            }
            .logo {
                max-width: 80px;
                height: auto;
                margin: 0 auto 1rem;
            }
            @media (max-width: 768px) {
                .logo {
                    max-width: 40px;
                }
            }
            .header h1 {
                font-size: 3.75rem;
                font-weight: bold;
                margin-bottom: 1rem;
                text-transform: uppercase;
            }
            @media (max-width: 768px) {
                .header h1 {
                    font-size: 2rem;
                }
            }
            .header p {
                font-size: 1.25rem;
                font-weight: bold;
                text-transform: capitalize;
                line-height: 1.2;
                color: rgba(255,255,255,0.75);
            }
            .plans-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 2rem 0;
            }
            @media (min-width: 1024px) {
                .plans-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 3rem;
                }
            }
            .plan-card {
                border: 1px solid;
                border-radius: 1rem;
                padding: 1.5rem;
                position: relative;
                display: flex;
                flex-direction: column;
                min-height: 500px;
                background: rgba(8, 12, 24, 0.8);
                backdrop-filter: blur(20px);
            }
            .plan-card.crypto {
                border-color: #ffa023;
            }
            .plan-card.card {
                border-color: #970008;
                opacity: 0.6;
            }
            .plan-card.card .sold-out-banner {
                position: absolute;
                top: 0;
                right: 0;
                background: linear-gradient(to right, #dc2626, #ef4444);
                color: white;
                padding: 0.5rem 0.75rem;
                border-radius: 0 0 0 1rem;
                font-weight: bold;
                font-size: 0.875rem;
            }
            .plan-header {
                margin-bottom: 1.5rem;
            }
            .plan-name {
                font-size: 1.375rem;
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 0.5rem;
                background: linear-gradient(109.78deg, #FFFFFF -13.37%, #FFCF23 38.96%, #FF8D3A 138.03%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            .plan-card.card .plan-name {
                color: #B7B6B7;
                background: none;
                -webkit-text-fill-color: unset;
            }
            .plan-price {
                font-size: 3.75rem;
                font-weight: bold;
                margin-bottom: 0.5rem;
            }
            @media (max-width: 768px) {
                .plan-price {
                    font-size: 2.75rem;
                }
            }
            .plan-price-currency {
                font-size: 1.75rem;
            }
            .plan-price-period {
                font-size: 1.375rem;
                color: rgba(255, 255, 255, 0.7);
                text-transform: uppercase;
            }
            .features {
                flex: 1;
                margin-bottom: 1.5rem;
            }
            .feature-item {
                display: flex;
                align-items: flex-start;
                gap: 0.5rem;
                margin-bottom: 1rem;
                font-size: 0.95rem;
            }
            .feature-icon {
                width: 16px;
                height: 16px;
                flex-shrink: 0;
                margin-top: 2px;
                color: #29E517;
            }
            .plan-card.card .feature-icon {
                color: #6b7280;
            }
            .plan-button {
                padding: 0.75rem 1rem;
                border: 1px solid;
                border-radius: 0.5rem;
                font-size: 1rem;
                font-weight: bold;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                width: 100%;
            }
            .plan-button.crypto {
                background: #FF8D3A;
                border-color: #FF8D3A;
                color: white;
            }
            .plan-button.crypto:hover {
                background: #ff7d1f;
                transform: scale(1.02);
            }
            .plan-button.card {
                background: #24374940;
                border-color: #243749;
                color: rgba(255, 255, 255, 0.5);
                cursor: not-allowed;
                pointer-events: none;
            }
            .button-icon {
                width: 24px;
                height: 24px;
            }
            .student-badge {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 1rem;
                padding: 2rem 0;
                text-align: center;
            }
            @media (min-width: 1024px) {
                .student-badge {
                    flex-direction: row;
                }
            }
            .student-badge img {
                height: 35px;
                width: auto;
            }
            .student-badge p {
                margin: 0;
                font-weight: bold;
                font-size: 0.875rem;
            }
            .footer-text {
                text-align: center;
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.875rem;
                margin-top: 1rem;
            }
            .crypto-note {
                margin: 1rem 0 0;
                color: rgba(255, 255, 255, 0.7);
                font-size: 0.95rem;
                text-align: center;
            }
            .input-group {
                display: grid;
                gap: 1rem;
                margin-top: 1rem;
            }
            .input-group label {
                display: block;
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
                color: rgba(255,255,255,0.75);
            }
            .input-group input,
            .input-group select {
                width: 100%;
                padding: 0.85rem 1rem;
                border-radius: 0.75rem;
                border: 1px solid rgba(255,255,255,0.12);
                background: rgba(255,255,255,0.04);
                color: white;
                font-size: 1rem;
            }
            .input-group input::placeholder {
                color: rgba(255,255,255,0.45);
            }
        </style>
    </head>
<body>
    <main>
        <div class="container">
            <div class="header">
                <img src="{{ asset('images/logo.webp') }}" alt="The Real World Logo" class="logo" />
                <h1>Deposit with Crypto</h1>
                <p>Only cryptocurrency payments are accepted here. Card payments are currently unavailable.</p>
            </div>

            <div class="plans-grid">
                <div class="plan-card crypto">
                    <div class="plan-header">
                        <div class="plan-name">Crypto Deposit</div>
                        <div>
                            <div class="plan-price">
                                <span class="plan-price-currency">$</span>0<span class="plan-price-period">/instant</span>
                            </div>
                        </div>
                    </div>

                    <div class="features">
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Fast crypto funding</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Supports BTC / ETH / USDC</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Instant wallet credit</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('wallet.store.deposit') }}">
                        @csrf
                        <div class="input-group">
                            <label for="amount">Deposit Amount</label>
                            <input id="amount" name="amount" type="number" step="0.01" min="0.01" placeholder="Enter USD amount" required />
                        </div>
                        <div class="input-group">
                            <label for="currency">Cryptocurrency</label>
                            <select id="currency" disabled>
                                <option>Bitcoin (BTC)</option>
                                <option>Ethereum (ETH)</option>
                                <option>USD Coin (USDC)</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="description">Description</label>
                            <input id="description" name="description" type="text" placeholder="Deposit note (optional)" />
                        </div>
                        <button class="plan-button crypto" type="submit">
                            <svg class="button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14"></path>
                                <path d="M5 12h14"></path>
                            </svg>
                            Deposit Crypto
                        </button>
                    </form>

                    <p class="crypto-note">Payments are processed only via crypto. Card payment is disabled until supported.</p>
                </div>

                <div class="plan-card card">
                    <div class="sold-out-banner">Unavailable</div>
                    <div class="plan-header">
                        <div class="plan-name">Card Payment</div>
                        <div>
                            <div class="plan-price">
                                <span class="plan-price-currency">$</span>0<span class="plan-price-period">/instant</span>
                            </div>
                        </div>
                    </div>

                    <div class="features">
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Not accepted at this time</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Card checkout is currently disabled</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Crypto only for wallet funding</span>
                        </div>
                    </div>

                    <button class="plan-button card" disabled>
                        Card Not Available
                    </button>
                </div>
            </div>

            <div class="student-badge">
                <img src="{{ asset('images/student_profiles.png') }}" alt="Student Profiles" />
                <p>Secure crypto deposits for your wallet. Card checkout is not available here.</p>
            </div>

            <div class="footer-text">*All deposits are processed in crypto. USD values are for reference only.</div>
        </div>
    </main>
</body>
</html>
