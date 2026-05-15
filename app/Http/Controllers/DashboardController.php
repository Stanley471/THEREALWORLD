<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wallet = $user->wallet;

        return view('dashboard', [
            'wallet' => $wallet,
            'balance' => $wallet?->balance ?? 0,
            'recentActivities' => $wallet?->getRecentTransactions(6) ?? collect(),
        ]);
    }
}
