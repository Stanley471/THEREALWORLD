<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('apply:daily-returns', function () {
    $this->comment('Applying today\'s configured daily returns...');

    \App\Models\User::whereNotNull('daily_return')->chunk(100, function ($users) {
        foreach ($users as $user) {
            if ($user->daily_return === null || $user->daily_return == 0) {
                continue;
            }

            $wallet = $user->wallet ?? $user->wallet()->create(['balance' => 0]);
            $wallet->applyDailyReturn($user->daily_return, 'Immediate daily return test run');
            $this->comment(sprintf('Applied %s%% to user %s', $user->daily_return, $user->email));
        }
    });

    $this->comment('Daily return application complete.');
})->purpose('Apply configured daily returns immediately');
