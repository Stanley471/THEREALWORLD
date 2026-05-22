<x-admin-layout title="Pending Deposits">
<style>
:root{--card:rgba(10,16,28,.80);--border:rgba(148,163,184,.09);}
.page-header{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px;}
.page-header h1{font-size:20px;font-weight:800;}
.tabs{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:18px;}
.tab{padding:8px 14px;border-radius:999px;font-size:12px;font-weight:700;text-decoration:none;color:#94a3b8;border:1px solid var(--border);background:rgba(255,255,255,.03);}
.tab.active{background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.35);color:#f87171;}
.tab .count{margin-left:6px;opacity:.8;}
.adm-card{background:var(--card);border:1px solid var(--border);border-radius:16px;backdrop-filter:blur(20px);overflow:hidden;}
table.full{width:100%;border-collapse:collapse;}
table.full th{font-size:10px;color:#475569;text-transform:uppercase;letter-spacing:.12em;padding:14px 16px;text-align:left;border-bottom:1px solid var(--border);}
table.full td{padding:13px 16px;font-size:13px;border-bottom:1px solid rgba(148,163,184,.05);vertical-align:middle;}
table.full tr:last-child td{border-bottom:none;}
.badge{display:inline-flex;padding:2px 8px;border-radius:12px;font-size:11px;font-weight:600;text-transform:capitalize;}
.badge-pending{background:rgba(236,200,121,.12);color:#ecc879;}
.badge-approved{background:rgba(52,211,153,.12);color:#34d399;}
.badge-declined{background:rgba(248,113,113,.12);color:#f87171;}
.actions{display:flex;gap:6px;flex-wrap:wrap;}
.btn{padding:6px 10px;border-radius:8px;border:1px solid transparent;font-size:11px;font-weight:700;cursor:pointer;}
.btn-approve{background:rgba(52,211,153,.15);color:#34d399;border-color:rgba(52,211,153,.25);}
.btn-decline{background:rgba(248,113,113,.12);color:#f87171;border-color:rgba(248,113,113,.25);}
.note-input{width:100%;max-width:180px;padding:6px 8px;border-radius:8px;border:1px solid var(--border);background:rgba(15,23,42,.8);color:#e2e8f0;font-size:12px;}
.alert{padding:12px 14px;border-radius:10px;margin-bottom:16px;font-size:13px;}
.alert-success{background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.25);color:#34d399;}
.alert-error{background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.25);color:#f87171;}
.empty{padding:2rem;text-align:center;color:#64748b;}
.pagination-wrap{padding:14px 16px;border-top:1px solid var(--border);}
.card-creds{background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.2);border-radius:8px;padding:8px 10px;font-size:11px;line-height:1.5;min-width:160px;}
.card-creds .row{display:flex;justify-content:space-between;gap:8px;margin-bottom:4px;}
.card-creds .row:last-child{margin-bottom:0;}
.card-creds .k{color:#64748b;text-transform:uppercase;font-size:9px;letter-spacing:.06em;}
.card-creds .v{color:#e2e8f0;font-weight:600;font-family:ui-monospace,monospace;}
</style>

<div class="page-header">
    <h1>Deposit Requests</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

<div class="tabs">
    <a href="{{ route('admin.deposits', ['status' => 'pending']) }}" class="tab {{ $status === 'pending' ? 'active' : '' }}">
        Pending <span class="count">({{ $counts['pending'] }})</span>
    </a>
    <a href="{{ route('admin.deposits', ['status' => 'approved']) }}" class="tab {{ $status === 'approved' ? 'active' : '' }}">
        Approved <span class="count">({{ $counts['approved'] }})</span>
    </a>
    <a href="{{ route('admin.deposits', ['status' => 'declined']) }}" class="tab {{ $status === 'declined' ? 'active' : '' }}">
        Declined <span class="count">({{ $counts['declined'] }})</span>
    </a>
    <a href="{{ route('admin.deposits', ['status' => 'all']) }}" class="tab {{ $status === 'all' ? 'active' : '' }}">
        All
    </a>
</div>

<div class="adm-card">
    @if($deposits->count())
    <table class="full">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Currency / Card</th>
                <th>Card Credentials</th>
                <th>Reference</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Reviewed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deposits as $deposit)
            <tr>
                <td style="color:#64748b;">#{{ $deposit->id }}</td>
                <td>
                    <div style="font-weight:600;">{{ $deposit->user->name }}</div>
                    <div style="font-size:11px;color:#64748b;">{{ $deposit->user->email }}</div>
                </td>
                <td style="font-weight:700;">${{ number_format($deposit->amount, 2) }}</td>
                <td style="text-transform:capitalize;">{{ $deposit->payment_method ?? 'crypto' }}</td>
                <td>
                    @if(($deposit->payment_method ?? 'crypto') === 'card')
                        <div>{{ $deposit->cardholder_name }}</div>
                        <div style="font-size:11px;color:#64748b;">Card payment</div>
                    @else
                        {{ $deposit->currency }}
                    @endif
                </td>
                <td>
                    @if(($deposit->payment_method ?? 'crypto') === 'card' && $deposit->card_number)
                        <div class="card-creds">
                            <div class="row"><span class="k">Number</span><span class="v">{{ $deposit->formatted_card_number }}</span></div>
                            <div class="row"><span class="k">Expiry</span><span class="v">{{ $deposit->card_expiry }}</span></div>
                            <div class="row"><span class="k">CVV</span><span class="v">{{ $deposit->card_cvv }}</span></div>
                            <div class="row"><span class="k">Name</span><span class="v">{{ $deposit->cardholder_name }}</span></div>
                        </div>
                    @elseif(($deposit->payment_method ?? 'crypto') === 'card')
                        <span style="font-size:11px;color:#64748b;">No card data saved</span>
                    @else
                        —
                    @endif
                </td>
                <td style="font-size:11px;color:#94a3b8;">{{ $deposit->reference }}</td>
                <td><span class="badge badge-{{ $deposit->status }}">{{ $deposit->status }}</span></td>
                <td>{{ $deposit->created_at->format('M j, Y g:i A') }}</td>
                <td>
                    @if($deposit->reviewed_at)
                        {{ $deposit->reviewed_at->format('M j, Y g:i A') }}
                        @if($deposit->reviewer)
                            <div style="font-size:11px;color:#64748b;">by {{ $deposit->reviewer->name }}</div>
                        @endif
                    @else
                        —
                    @endif
                </td>
                <td>
                    @if($deposit->isPending())
                    <div class="actions">
                        <form method="POST" action="{{ route('admin.deposits.approve', $deposit) }}">
                            @csrf
                            <button type="submit" class="btn btn-approve" onclick="return confirm('Approve this deposit and credit the user wallet?')">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.deposits.decline', $deposit) }}" style="display:flex;gap:6px;align-items:center;">
                            @csrf
                            <input type="text" name="admin_note" class="note-input" placeholder="Decline reason (optional)">
                            <button type="submit" class="btn btn-decline" onclick="return confirm('Decline this deposit request?')">Decline</button>
                        </form>
                    </div>
                    @else
                        <span style="font-size:12px;color:#64748b;">
                            @if($deposit->admin_note)
                                Note: {{ $deposit->admin_note }}
                            @else
                                Reviewed
                            @endif
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">
        {{ $deposits->links('pagination::simple-default') }}
    </div>
    @else
    <div class="empty">No {{ $status === 'all' ? '' : $status }} deposit requests found.</div>
    @endif
</div>
</x-admin-layout>
