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
        $validated = $request->validate([
            'withdrawal_address' => ['required', 'string', 'min:20', 'max:255'],
        ]);

        Auth::user()->update([
            'withdrawal_address' => $validated['withdrawal_address'],
        ]);

        return redirect()->route('settings.index')->with('success', 'Withdrawal address updated successfully.');
    }
}
