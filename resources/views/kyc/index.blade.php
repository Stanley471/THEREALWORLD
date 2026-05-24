<x-dashboard-layout title="Identity Verification">
    <style>
        .kyc-container { max-width: 800px; margin: 0 auto; padding: 2rem 1rem; }
        .page-title { font-size: 2.5rem; margin-bottom: 0.5rem; }
        .page-subtitle { color: rgba(226,232,240,0.7); margin-bottom: 2.5rem; }
        .card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 2rem; margin-bottom: 2rem; }
        .alert { padding: 1.25rem; border-radius: 0.85rem; margin-bottom: 2rem; font-size: 0.95rem; line-height: 1.5; display: flex; gap: 1rem; }
        .alert-pending { background: rgba(236,200,121,0.1); border: 1px solid rgba(236,200,121,0.3); color: #ecc879; }
        .alert-approved { background: rgba(52,211,153,0.1); border: 1px solid rgba(52,211,153,0.3); color: #34d399; }
        .alert-rejected { background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.3); color: #f87171; }
        .alert-success { background: rgba(52,211,153,0.1); border: 1px solid rgba(52,211,153,0.3); color: #34d399; }
        
        .form-group { margin-bottom: 1.5rem; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: rgba(226,232,240,0.9); font-size: 0.95rem; font-weight: 500; }
        .form-group input, .form-group select { width: 100%; padding: 0.85rem 1rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); border-radius: 0.75rem; color: white; font-size: 0.95rem; }
        .form-group input[type="file"] { padding: 0.65rem 1rem; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: rgba(255,141,58,0.5); }
        .form-group .help-text { font-size: 0.85rem; color: rgba(226,232,240,0.5); margin-top: 0.35rem; display: block; }
        
        .submit-btn { display: block; width: 100%; padding: 1rem; background: linear-gradient(135deg, #FFCF23, #FF8D3A); color: #04080f; font-weight: 700; border: none; border-radius: 0.75rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.05em; transition: opacity 0.2s; }
        .submit-btn:hover { opacity: 0.9; }

        @media (max-width: 600px) {
            .form-row { grid-template-columns: 1fr; }
        }
    </style>

    <div class="kyc-container">
        @if(session('success'))
            <div class="alert alert-success">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <h1 class="page-title">Identity Verification</h1>
        <p class="page-subtitle">Complete your KYC to unlock full account features, including withdrawals.</p>

        @if($kyc && $kyc->status === 'approved')
            <div class="alert alert-approved">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <strong>Verification Complete</strong><br>
                    Your identity has been successfully verified. You can now use all platform features.
                </div>
            </div>
        @elseif($kyc && $kyc->status === 'pending')
            <div class="alert alert-pending">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <strong>Verification Pending</strong><br>
                    Your documents are currently under review by our compliance team. This usually takes 1-24 hours.
                </div>
            </div>
        @else
            @if($kyc && $kyc->status === 'rejected')
                <div class="alert alert-rejected">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <strong>Verification Rejected</strong><br>
                        Your submission was not accepted. Reason: <em>{{ $kyc->rejection_reason }}</em><br>
                        Please correct the issues and resubmit below.
                    </div>
                </div>
            @endif

            <div class="card">
                <form method="POST" action="{{ route('kyc.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">Legal First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">Legal Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        @error('date_of_birth') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="document_type">Document Type</label>
                        <select id="document_type" name="document_type" required>
                            <option value="">Select Document...</option>
                            <option value="passport" @selected(old('document_type') === 'passport')>Passport</option>
                            <option value="driver_license" @selected(old('document_type') === 'driver_license')>Driver's License</option>
                            <option value="national_id" @selected(old('document_type') === 'national_id')>National ID Card</option>
                        </select>
                        @error('document_type') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="document_front">Document Front</label>
                            <input type="file" id="document_front" name="document_front" accept="image/jpeg,image/png,image/jpg" required>
                            <span class="help-text">Clear picture, all corners visible. Max 4MB.</span>
                            @error('document_front') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="document_back">Document Back (Optional)</label>
                            <input type="file" id="document_back" name="document_back" accept="image/jpeg,image/png,image/jpg">
                            <span class="help-text">Required for ID cards and Driver's Licenses.</span>
                            @error('document_back') <span style="color:#f87171;font-size:0.85rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Submit Verification</button>
                </form>
            </div>
        @endif
    </div>
</x-dashboard-layout>
