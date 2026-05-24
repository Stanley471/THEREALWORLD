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

        $allTx = $wallet->transactions()->get();
        $trendValues = [];
        foreach ($trendDates as $date) {
            $endOfDay = Carbon::parse($date)->endOfDay();
            $balanceAtDate = $allTx->where('created_at', '<=', $endOfDay)
                ->reduce(function ($carry, $tx) {
                    $isPositive = in_array($tx->type, ['deposit', 'returns', 'adjustment']);
                    return $carry + ($isPositive ? $tx->amount : -$tx->amount);
                }, 0);
            $trendValues[] = (float) $balanceAtDate;
        }

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

    public function getChartData(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $wallet = $user->wallet;

        if (!$wallet) {
            return response()->json(['labels' => [], 'values' => []]);
        }

        $range = $request->query('range', '7d');

        $days = match($range) {
            '7d'  => 7,
            '1m'  => 30,
            '1y'  => 365,
            'all' => null,
            default => 7,
        };

        if ($days === null) {
            $firstTx = $wallet->transactions()->oldest('created_at')->first();
            $days = $firstTx ? max(1, now()->diffInDays($firstTx->created_at)) : 7;
        }

        $trendDates = collect(range($days, 0, -1))
            ->map(fn ($d) => now()->subDays($d)->format('Y-m-d'));

        $allTx = $wallet->transactions()->get();
        $trendValues = [];
        $trendLabels = [];

        foreach ($trendDates as $date) {
            $endOfDay = Carbon::parse($date)->endOfDay();
            $balanceAtDate = $allTx->where('created_at', '<=', $endOfDay)
                ->reduce(function ($carry, $tx) {
                    $isPositive = in_array($tx->type, ['deposit', 'returns', 'adjustment']);
                    return $carry + ($isPositive ? $tx->amount : -$tx->amount);
                }, 0);
            
            $trendValues[] = (float) $balanceAtDate;

            if ($range === '7d') {
                $trendLabels[] = Carbon::parse($date)->format('D'); // e.g. Mon, Tue
            } elseif ($range === '1y' || $range === 'all') {
                $trendLabels[] = Carbon::parse($date)->format('M Y');
            } else {
                $trendLabels[] = Carbon::parse($date)->format('M d');
            }
        }

        return response()->json([
            'labels' => $trendLabels,
            'values' => $trendValues
        ]);
    }
}
