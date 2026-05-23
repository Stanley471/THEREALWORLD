<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('settings.index', [
            'title' => 'Settings',
            'user' => $user,
        ]);
    }

    public function updateWithdrawalAddress(Request $request)
    {
        $user = Auth::user();

        if (!$user->transaction_pin) {
            return redirect()->route('settings.index')->with('error', 'Please set up a Transaction PIN first.');
        }

        $validated = $request->validate([
            'withdrawal_address' => ['required', 'string', 'min:20', 'max:255'],
            'transaction_pin' => ['required', 'string', 'size:4'],
        ]);

        if ($validated['transaction_pin'] !== $user->transaction_pin) {
            return back()->withErrors(['transaction_pin' => 'Incorrect Transaction PIN.']);
        }

        $user->update([
            'withdrawal_address' => $validated['withdrawal_address'],
        ]);

        return redirect()->route('settings.index')->with('success', 'Withdrawal address updated successfully.');
    }

    public function updatePin(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'new_pin' => ['required', 'string', 'digits:4', 'confirmed'],
        ];

        if ($user->transaction_pin) {
            $rules['current_pin'] = ['required', 'string', 'size:4'];
        }

        $validated = $request->validate($rules);

        if ($user->transaction_pin && $validated['current_pin'] !== $user->transaction_pin) {
            return back()->withErrors(['current_pin' => 'Incorrect current PIN.']);
        }

        $user->update([
            'transaction_pin' => $validated['new_pin'],
        ]);

        return redirect()->route('settings.index')->with('success', 'Transaction PIN updated successfully.');
    }
}
