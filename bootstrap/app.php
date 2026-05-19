<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->withSchedule(function (Schedule $schedule): void {
        $schedule->call(function () {
            \App\Models\User::whereNotNull('daily_return')->chunk(100, function ($users) {
                foreach ($users as $user) {
                    if ($user->daily_return === null || $user->daily_return == 0) {
                        continue;
                    }

                    $wallet = $user->wallet ?? $user->wallet()->create(['balance' => 0]);
                    $wallet->applyDailyReturn($user->daily_return, 'Daily return applied at 1am GMT');
                }
            });
        })->dailyAt('01:00')->timezone('UTC');
    })
    ->create();
