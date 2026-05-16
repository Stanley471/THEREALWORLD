<x-admin-layout title="Manage Users">
<style>
:root{--card:rgba(10,16,28,.80);--border:rgba(148,163,184,.09);}
.page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;}
.page-header h1{font-size:20px;font-weight:800;}
.search-bar{display:flex;align-items:center;gap:10px;}
.search-bar input{
    padding:9px 14px;border-radius:10px;
    background:rgba(15,23,42,.80);border:1px solid var(--border);
    color:#e2e8f0;font-size:13px;width:220px;outline:none;
    transition:border-color .15s;
}
.search-bar input:focus{border-color:rgba(239,68,68,.4);}
.search-bar input::placeholder{color:#475569;}

.adm-card{background:var(--card);border:1px solid var(--border);border-radius:16px;backdrop-filter:blur(20px);overflow:hidden;}

table.full{width:100%;border-collapse:collapse;}
table.full th{font-size:10px;color:#475569;text-transform:uppercase;letter-spacing:.12em;padding:14px 16px;text-align:left;border-bottom:1px solid var(--border);}
table.full td{padding:13px 16px;font-size:13px;border-bottom:1px solid rgba(148,163,184,.05);vertical-align:middle;}
table.full tr:last-child td{border-bottom:none;}
table.full tr:hover td{background:rgba(239,68,68,.03);}

.u-avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#ecc879,#FF8D3A);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#04080f;flex-shrink:0;}
.u-info{display:flex;align-items:center;gap:10px;}
.u-name{font-weight:600;}
.u-email{font-size:11px;color:#475569;}

.badge{display:inline-flex;padding:2px 8px;border-radius:12px;font-size:11px;font-weight:600;}
.badge-green{background:rgba(52,211,153,.12);color:#34d399;}
.badge-yellow{background:rgba(236,200,121,.12);color:#ecc879;}
.badge-red{background:rgba(248,113,113,.12);color:#f87171;}
.badge-gray{background:rgba(148,163,184,.08);color:#64748b;}

/* Pagination */
.pagination-wrap{padding:14px 16px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.pagination-wrap .pg-info{font-size:12px;color:#475569;}
.pagination-wrap .pg-links{display:flex;gap:4px;}
.pagination-wrap .pg-links a, .pagination-wrap .pg-links span{
    display:inline-flex;align-items:center;justify-content:center;
    width:30px;height:30px;border-radius:8px;font-size:12px;font-weight:600;
    text-decoration:none;color:#94a3b8;border:1px solid var(--border);
    background:rgba(255,255,255,.03);transition:background .15s,color .15s;
}
.pagination-wrap .pg-links .active{background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.3);color:#f87171;}
.pagination-wrap .pg-links a:hover{background:rgba(239,68,68,.08);color:#f87171;}
</style>

<div class="page-header">
    <h1>All Users <span style="font-size:14px;color:#475569;font-weight:400;">({{ $users->total() }} total)</span></h1>
    <div class="search-bar">
        <input type="text" placeholder="Search users…" id="user-search">
    </div>
</div>

<div class="adm-card">
    <table class="full">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Email Status</th>
                <th>Role</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td style="color:#475569;font-size:12px;">{{ $u->id }}</td>
                <td>
                    <div class="u-info">
                        <div class="u-avatar">{{ strtoupper(substr($u->name,0,1)) }}</div>
                        <div>
                            <div class="u-name">{{ $u->name }}</div>
                            <div class="u-email">{{ $u->email }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    @if($u->email_verified_at)
                        <span class="badge badge-green">✓ Verified</span>
                    @else
                        <span class="badge badge-yellow">⏳ Unverified</span>
                    @endif
                </td>
                <td>
                    @if($u->id === 1)
                        <span class="badge badge-red">Admin</span>
                    @else
                        <span class="badge badge-gray">Member</span>
                    @endif
                </td>
                <td style="color:#64748b;font-size:12px;">
                    {{ $u->created_at->format('M d, Y') }}<br>
                    <span style="font-size:10px;">{{ $u->created_at->diffForHumans() }}</span>
                </td>
                <td>
                    <div style="display:flex;gap:6px;">
                        <a href="{{ route('admin.users.edit', $u->id) }}" style="padding:5px 10px;border-radius:7px;background:rgba(236,200,121,.1);border:1px solid rgba(236,200,121,.2);color:#ecc879;font-size:11px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-block;" title="Edit">Edit</a>
                        @if($u->id !== auth()->id())
                        <button style="padding:5px 10px;border-radius:7px;background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.2);color:#f87171;font-size:11px;font-weight:600;cursor:pointer;" title="Delete">Delete</button>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-wrap">
        <span class="pg-info">
            Showing {{ $users->firstItem() }}–{{ $users->lastItem() }} of {{ $users->total() }}
        </span>
        <div class="pg-links">
            {{ $users->links() }}
        </div>
    </div>
</div>
</x-admin-layout>
