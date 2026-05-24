<x-admin-layout title="KYC Management">
    <style>
        .adm-card { background: rgba(10,16,28,.80); border: 1px solid rgba(148,163,184,.09); border-radius: 16px; backdrop-filter: blur(20px); overflow: hidden; padding: 1.5rem; margin-bottom: 2rem; }
        .kyc-table { width: 100%; border-collapse: collapse; }
        .kyc-table th { text-align: left; padding: 1rem; color: #94a3b8; font-size: 0.85rem; text-transform: uppercase; border-bottom: 1px solid rgba(148,163,184,.1); }
        .kyc-table td { padding: 1rem; border-bottom: 1px solid rgba(148,163,184,.05); vertical-align: middle; }
        .badge { padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
        .badge.pending { background: rgba(236,200,121,0.1); color: #ecc879; }
        .badge.approved { background: rgba(52,211,153,0.1); color: #34d399; }
        .badge.rejected { background: rgba(248,113,113,0.1); color: #f87171; }
        .doc-link { color: #0ea5e9; text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.25rem; }
        .doc-link:hover { text-decoration: underline; }
        .action-btn { padding: 0.5rem 1rem; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: opacity 0.2s; font-size: 0.85rem; color: white; }
        .action-btn.approve { background: #10b981; }
        .action-btn.reject { background: #ef4444; }
        .action-btn:hover { opacity: 0.8; }
        .actions-flex { display: flex; gap: 0.5rem; }
        .reject-reason { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 0.5rem; border-radius: 0.5rem; color: white; width: 150px; }
    </style>

    <div class="adm-card">
        <h2 style="margin-top:0;margin-bottom:1.5rem;">KYC Applications</h2>
        
        @if(session('success'))
            <div style="background:rgba(52,211,153,.1);color:#34d399;padding:1rem;border-radius:0.5rem;margin-bottom:1rem;">
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x:auto;">
            <table class="kyc-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Name & DOB</th>
                        <th>Document</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kycs as $kyc)
                        <tr>
                            <td>
                                <div><strong>{{ $kyc->user->name }}</strong></div>
                                <div style="font-size:0.85rem;color:#94a3b8;">{{ $kyc->user->email }}</div>
                            </td>
                            <td>
                                <div>{{ $kyc->first_name }} {{ $kyc->last_name }}</div>
                                <div style="font-size:0.85rem;color:#94a3b8;">{{ \Carbon\Carbon::parse($kyc->date_of_birth)->format('M d, Y') }}</div>
                            </td>
                            <td>
                                <div style="text-transform:capitalize;margin-bottom:0.25rem;">{{ str_replace('_', ' ', $kyc->document_type) }}</div>
                                <a href="{{ Storage::url($kyc->document_front_path) }}" target="_blank" class="doc-link">Front</a>
                                @if($kyc->document_back_path)
                                    | <a href="{{ Storage::url($kyc->document_back_path) }}" target="_blank" class="doc-link">Back</a>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $kyc->status }}">{{ $kyc->status }}</span>
                            </td>
                            <td style="font-size:0.85rem;color:#94a3b8;">
                                {{ $kyc->created_at->diffForHumans() }}
                            </td>
                            <td>
                                @if($kyc->status === 'pending')
                                    <div class="actions-flex">
                                        <form method="POST" action="{{ route('admin.kyc.approve', $kyc) }}">
                                            @csrf
                                            <button type="submit" class="action-btn approve">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.kyc.reject', $kyc) }}" style="display:flex;gap:0.5rem;">
                                            @csrf
                                            <input type="text" name="rejection_reason" placeholder="Reason..." class="reject-reason" required>
                                            <button type="submit" class="action-btn reject">Reject</button>
                                        </form>
                                    </div>
                                @else
                                    <span style="color:#94a3b8;font-size:0.85rem;">Reviewed</span>
                                    @if($kyc->status === 'rejected')
                                        <div style="font-size:0.75rem;color:#ef4444;margin-top:0.25rem;max-width:200px;">Reason: {{ $kyc->rejection_reason }}</div>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:2rem;color:#94a3b8;">No KYC applications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top: 1rem;">
            {{ $kycs->links() }}
        </div>
    </div>
</x-admin-layout>
