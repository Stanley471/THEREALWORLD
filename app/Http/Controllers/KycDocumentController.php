<?php

namespace App\Http\Controllers;

use App\Models\KycDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KycDocumentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kyc = $user->kyc;

        return view('kyc.index', compact('kyc'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->kyc && in_array($user->kyc->status, ['pending', 'approved'])) {
            return redirect()->route('kyc.index')->with('error', 'You have already submitted your KYC.');
        }

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'document_type' => ['required', 'in:passport,driver_license,national_id'],
            'document_front' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'document_back' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);

        $frontPath = $request->file('document_front')->store('kyc_documents', 'public');
        $backPath = $request->hasFile('document_back') ? $request->file('document_back')->store('kyc_documents', 'public') : null;

        if ($user->kyc) {
            // Update existing rejected KYC
            $user->kyc->update([
                'status' => 'pending',
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'date_of_birth' => $validated['date_of_birth'],
                'document_type' => $validated['document_type'],
                'document_front_path' => $frontPath,
                'document_back_path' => $backPath,
                'rejection_reason' => null,
            ]);
        } else {
            // Create new
            KycDocument::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'date_of_birth' => $validated['date_of_birth'],
                'document_type' => $validated['document_type'],
                'document_front_path' => $frontPath,
                'document_back_path' => $backPath,
            ]);
        }

        return redirect()->route('kyc.index')->with('success', 'KYC documents submitted successfully. They are now pending review.');
    }

    // Admin methods
    public function adminIndex()
    {
        $kycs = KycDocument::with('user')->latest()->paginate(20);
        return view('admin.kyc.index', compact('kycs'));
    }

    public function approve(KycDocument $kyc)
    {
        $kyc->update(['status' => 'approved', 'rejection_reason' => null]);
        return back()->with('success', 'KYC application approved.');
    }

    public function reject(Request $request, KycDocument $kyc)
    {
        $request->validate([
            'rejection_reason' => ['required', 'string', 'max:1000'],
        ]);

        $kyc->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', 'KYC application rejected.');
    }
}
