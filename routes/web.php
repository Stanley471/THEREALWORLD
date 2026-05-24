<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/community', function () {
        return view('community');
    })->name('community');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('/withdrawal', [SettingsController::class, 'updateWithdrawalAddress'])->name('withdrawal.update');
        Route::post('/pin', [SettingsController::class, 'updatePin'])->name('pin.update');
    });

    Route::get('/portfolio', function () {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $wallet = $user->wallet ?? $user->wallet()->create(['balance' => 0]);
        $totalDeposited = $wallet->transactions()->where('type', 'deposit')->sum('amount');
        $totalWithdrawn = $wallet->transactions()->where('type', 'withdrawal')->sum('amount');
        $totalReturns = $wallet->transactions()->where('type', 'returns')->sum('amount');
        $recentTransactions = $wallet->transactions()->latest()->take(6)->get();

        return view('portfolio', compact(
            'wallet', 'totalDeposited', 'totalWithdrawn', 'totalReturns', 'recentTransactions'
        ));
    })->name('portfolio');

    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::get('/deposit', [WalletController::class, 'deposit'])->name('deposit');
        Route::post('/deposit', [WalletController::class, 'storeDeposit'])->name('store.deposit');
        Route::get('/deposit/instructions', [WalletController::class, 'depositInstructions'])->name('deposit.instructions');
        Route::post('/deposit/complete', [WalletController::class, 'completeDeposit'])->name('deposit.complete');
        Route::get('/deposit/confirmation', [WalletController::class, 'depositConfirmation'])->name('deposit.confirmation');
        Route::get('/withdraw', [WalletController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw', [WalletController::class, 'storeWithdraw'])->name('store.withdraw');
        Route::get('/transactions', [WalletController::class, 'transactions'])->name('transactions');
    });

    Route::prefix('kyc')->name('kyc.')->group(function () {
        Route::get('/', [\App\Http\Controllers\KycDocumentController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\KycDocumentController::class, 'store'])->name('store');
    });
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');

    Route::get('/deposits', [AdminController::class, 'deposits'])->name('deposits');
    Route::post('/deposits/{pendingDeposit}/approve', [AdminController::class, 'approveDeposit'])->name('deposits.approve');
    Route::post('/deposits/{pendingDeposit}/decline', [AdminController::class, 'declineDeposit'])->name('deposits.decline');

    Route::get('/kyc', [\App\Http\Controllers\KycDocumentController::class, 'adminIndex'])->name('kyc.index');
    Route::post('/kyc/{kyc}/approve', [\App\Http\Controllers\KycDocumentController::class, 'approve'])->name('kyc.approve');
    Route::post('/kyc/{kyc}/reject', [\App\Http\Controllers\KycDocumentController::class, 'reject'])->name('kyc.reject');
});

require __DIR__.'/auth.php';
