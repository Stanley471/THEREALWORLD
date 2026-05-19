<x-dashboard-layout title="Edit User">
    <div class="page-head">
        <div class="page-h-left">
            <h1>{{ $user->name }}</h1>
            <p>Edit user information and wallet settings</p>
        </div>
        <a href="{{ route('admin.users') }}" style="text-decoration:none;">
            <button style="padding:10px 20px;border:none;border-radius:8px;background:rgba(255,255,255,.1);color:#fff;font-weight:600;cursor:pointer;transition:all .3s ease;">
                ← Back to Users
            </button>
        </a>
    </div>

    <div style="display:grid;grid-template-columns:2fr 1fr;gap:24px;margin-top:24px;">
        <!-- Main Form -->
        <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:24px;">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Personal Info Section -->
                <div style="margin-bottom:32px;">
                    <h3 style="font-size:14px;font-weight:700;color:#fff;margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">Personal Information</h3>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;" required>
                        @error('name')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;" required>
                        @error('email')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Withdrawal Address</label>
                        <input type="text" name="withdrawal_address" value="{{ old('withdrawal_address', $user->withdrawal_address) }}" placeholder="e.g., User's crypto wallet address" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;">
                        <p style="font-size:11px;color:#808080;margin-top:6px;">Leave blank if user hasn't set one yet</p>
                        @error('withdrawal_address')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Min Daily Return (%)</label>
                        <input type="number" step="0.01" name="daily_return_min" value="{{ old('daily_return_min', $user->daily_return_min) }}" placeholder="0.10" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;">
                        <p style="font-size:11px;color:#808080;margin-top:6px;">Minimum percent for the user's random daily return.</p>
                        @error('daily_return_min')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Max Daily Return (%)</label>
                        <input type="number" step="0.01" name="daily_return_max" value="{{ old('daily_return_max', $user->daily_return_max) }}" placeholder="0.50" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;">
                        <p style="font-size:11px;color:#808080;margin-top:6px;">Maximum percent for the user's random daily return.</p>
                        @error('daily_return_max')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Assigned Daily Return</label>
                        <div style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;">
                            {{ $user->daily_return !== null ? number_format($user->daily_return, 2) . '%' : 'Not assigned yet' }}
                        </div>
                    </div>
                </div>

                <!-- Wallet Info Section -->
                @if($wallet)
                <div style="margin-bottom:32px;padding-top:24px;border-top:1px solid rgba(255,255,255,.1);">
                    <h3 style="font-size:14px;font-weight:700;color:#fff;margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">Wallet Management</h3>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Current Balance</label>
                        <div style="padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#a0a0a0;font-size:13px;display:flex;justify-content:space-between;align-items:center;">
                            <span>${{ number_format($wallet->balance, 2) }}</span>
                            <span style="font-size:11px;color:#808080;">(Read-only)</span>
                        </div>
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block;font-size:12px;font-weight:600;color:#a0a0a0;margin-bottom:8px;text-transform:uppercase;letter-spacing:.3px;">Adjust Balance (Optional)</label>
                        <input type="number" name="wallet_balance" step="0.01" min="0" value="" placeholder="Leave blank to keep current balance" style="width:100%;padding:10px 12px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:13px;">
                        <p style="font-size:11px;color:#808080;margin-top:6px;">Enter a new balance amount. Leave blank to keep current.</p>
                        @error('wallet_balance')
                            <span style="display:block;color:#f87171;font-size:12px;margin-top:4px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Transaction Info -->
                    <div style="margin-top:24px;padding:16px;background:rgba(236,200,121,.05);border:1px solid rgba(236,200,121,.2);border-radius:8px;">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:12px;">
                            <div>
                                <span style="color:#808080;">Total Deposited:</span>
                                <div style="color:#ecc879;font-weight:600;margin-top:4px;">${{ number_format($wallet->transactions()->where('type', 'deposit')->sum('amount'), 2) }}</div>
                            </div>
                            <div>
                                <span style="color:#808080;">Total Withdrawn:</span>
                                <div style="color:#f87171;font-weight:600;margin-top:4px;">${{ number_format($wallet->transactions()->where('type', 'withdrawal')->sum('amount'), 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div style="display:flex;gap:12px;margin-top:32px;padding-top:24px;border-top:1px solid rgba(255,255,255,.1);">
                    <button type="submit" style="flex:1;padding:12px 24px;border:none;border-radius:8px;background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);color:#fff;font-weight:600;cursor:pointer;transition:all .3s ease;font-size:13px;">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.users') }}" style="flex:1;text-decoration:none;">
                        <button type="button" style="width:100%;padding:12px 24px;border:1px solid rgba(255,255,255,.1);border-radius:8px;background:transparent;color:#fff;font-weight:600;cursor:pointer;transition:all .3s ease;font-size:13px;">
                            Cancel
                        </button>
                    </a>
                </div>

                @if ($errors->any())
                <div style="margin-top:20px;padding:12px;background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.2);border-radius:8px;color:#f87171;font-size:12px;">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin-top:6px;margin-bottom:0;padding-left:20px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div style="margin-top:20px;padding:12px;background:rgba(34,197,94,.1);border:1px solid rgba(34,197,94,.2);border-radius:8px;color:#22c55e;font-size:12px;">
                    {{ session('success') }}
                </div>
                @endif
            </form>
        </div>

        <!-- Sidebar Info -->
        <div>
            <!-- User Stats Card -->
            <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:20px;margin-bottom:20px;">
                <h3 style="font-size:12px;font-weight:700;color:#a0a0a0;margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">User Info</h3>

                <div style="margin-bottom:16px;">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">User ID</span>
                    <span style="display:block;font-size:13px;color:#fff;font-weight:600;">#{{ $user->id }}</span>
                </div>

                <div style="margin-bottom:16px;">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Email Status</span>
                    @if($user->email_verified_at)
                        <span style="display:inline-block;padding:4px 8px;background:rgba(34,197,94,.1);border:1px solid rgba(34,197,94,.2);border-radius:4px;color:#22c55e;font-size:11px;font-weight:600;">✓ Verified</span>
                    @else
                        <span style="display:inline-block;padding:4px 8px;background:rgba(234,179,8,.1);border:1px solid rgba(234,179,8,.2);border-radius:4px;color:#eab308;font-size:11px;font-weight:600;">⏳ Unverified</span>
                    @endif
                </div>

                <div style="margin-bottom:16px;">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Role</span>
                    @if($user->id === 1)
                        <span style="display:inline-block;padding:4px 8px;background:rgba(168,85,247,.1);border:1px solid rgba(168,85,247,.2);border-radius:4px;color:#a855f7;font-size:11px;font-weight:600;">Admin</span>
                    @else
                        <span style="display:inline-block;padding:4px 8px;background:rgba(59,130,246,.1);border:1px solid rgba(59,130,246,.2);border-radius:4px;color:#3b82f6;font-size:11px;font-weight:600;">Member</span>
                    @endif
                </div>

                <div style="margin-bottom:16px;padding-top:12px;border-top:1px solid rgba(255,255,255,.1);">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Joined Date</span>
                    <span style="display:block;font-size:13px;color:#fff;">{{ $user->created_at->format('M d, Y') }}</span>
                </div>

                <div>
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Last Updated</span>
                    <span style="display:block;font-size:13px;color:#fff;">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                </div>
            </div>

            <!-- Wallet Stats Card -->
            @if($wallet)
            <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:20px;">
                <h3 style="font-size:12px;font-weight:700;color:#a0a0a0;margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">Wallet Stats</h3>

                <div style="margin-bottom:16px;">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Wallet ID</span>
                    <span style="display:block;font-size:13px;color:#fff;font-weight:600;">#{{ $wallet->id }}</span>
                </div>

                <div style="margin-bottom:16px;">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Total Transactions</span>
                    <span style="display:block;font-size:13px;color:#fff;font-weight:600;">{{ $wallet->transactions()->count() }}</span>
                </div>

                <div style="margin-bottom:16px;padding-top:12px;border-top:1px solid rgba(255,255,255,.1);">
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Current Balance</span>
                    <span style="display:block;font-size:18px;color:#ecc879;font-weight:700;">${{ number_format($wallet->balance, 2) }}</span>
                </div>

                <div>
                    <span style="display:block;font-size:11px;color:#808080;margin-bottom:4px;">Net Flow</span>
                    <span style="display:block;font-size:13px;color:#fff;">
                        ${{ number_format($wallet->transactions()->where('type', 'deposit')->sum('amount') - $wallet->transactions()->where('type', 'withdrawal')->sum('amount'), 2) }}
                    </span>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
