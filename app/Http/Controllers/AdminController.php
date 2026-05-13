<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers      = User::count();
        $newUsersToday   = User::whereDate('created_at', today())->count();
        $newUsersWeek    = User::where('created_at', '>=', now()->subDays(7))->count();
        $verifiedUsers   = User::whereNotNull('email_verified_at')->count();

        // Recent registrations
        $recentUsers = User::latest()->take(8)->get();

        // User growth by day (last 7 days)
        $userGrowth = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        return view('admin.dashboard', compact(
            'totalUsers', 'newUsersToday', 'newUsersWeek',
            'verifiedUsers', 'recentUsers', 'userGrowth'
        ));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }
}
