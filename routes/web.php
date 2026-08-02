<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\NewsletterAdminController;

///Route::view('/', 'welcome');

Route::get('/', [ComingSoonController::class, 'index'])->name('coming-soon');
Route::post('/notify', [ComingSoonController::class, 'notify'])->name('coming-soon.notify');
Route::get('/terms', [LegalController::class, 'terms'])->name('legal.terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/cookies', [LegalController::class, 'cookies'])->name('legal.cookies');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:super,admin'])->group(function () {
    Route::get('admin/users', [AdminUsersController::class, 'index'])
        ->name('admin.users.index');

    Route::get('newsletter', [NewsletterAdminController::class, 'index'])
        ->name('newsletter.index');

    Route::post('newsletter/send', [NewsletterAdminController::class, 'send'])
        ->name('newsletter.send');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
