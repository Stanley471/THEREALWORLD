<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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

        $trendWindow = 6;
        $trendDates = collect(range($trendWindow, 0, -1))
            ->map(fn ($days) => now()->subDays($days)->format('Y-m-d'));

        $dailyNet = $wallet->transactions()
            ->where('created_at', '>=', now()->subDays($trendWindow)->startOfDay())
            ->get()
            ->groupBy(fn ($tx) => $tx->created_at->format('Y-m-d'))
            ->map(fn ($items) => $items->sum(fn ($tx) => $tx->type === 'deposit' ? $tx->amount : -$tx->amount));

        $trendValues = $trendDates->map(fn ($date) => $dailyNet->get($date, 0))->all();
        $trendLabels = $trendDates->map(fn ($date) => Carbon::parse($date)->format('D'))->all();

        $trendMax = max($trendValues) ?: 1;
        $trendMin = min($trendValues);
        if ($trendMax === $trendMin) {
            $trendMin = 0;
            $trendMax = max($trendMax, 1);
        }
        $trendRange = $trendMax - $trendMin ?: 1;

        return view('dashboard', [
            'wallet' => $wallet,
            'balance' => $wallet->balance,
            'totalDeposited' => $totalDeposited,
            'totalWithdrawn' => $totalWithdrawn,
            'transactionCount' => $transactionCount,
            'netFlow' => $totalDeposited - $totalWithdrawn,
            'recentActivities' => $recentActivities,
            'lastTransaction' => $recentActivities->first(),
            'trendLabels' => $trendLabels,
            'trendValues' => $trendValues,
            'trendMin' => $trendMin,
            'trendMax' => $trendMax,
            'trendRange' => $trendRange,
        ]);
    }
}
