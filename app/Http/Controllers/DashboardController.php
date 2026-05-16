<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create(['balance' => 0]);

        $totalDeposited = $wallet->transactions()->where('type', 'deposit')->sum('amount');
        $totalWithdrawn = $wallet->transactions()->where('type', 'withdrawal')->sum('amount');
        $transactionCount = $wallet->transactions()->count();
        $recentActivities = $wallet->transactions()->latest()->take(6)->get();

        return view('dashboard', [
            'wallet' => $wallet,
            'balance' => $wallet->balance,
            'totalDeposited' => $totalDeposited,
            'totalWithdrawn' => $totalWithdrawn,
            'transactionCount' => $transactionCount,
            'netFlow' => $totalDeposited - $totalWithdrawn,
            'recentActivities' => $recentActivities,
            'lastTransaction' => $recentActivities->first(),
        ]);
    }
}
