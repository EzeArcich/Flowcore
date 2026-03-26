<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\FollowUpController;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('companies', CompanyController::class);
    Route::resource('companies.contacts', ContactController::class)->shallow();

    Route::get('companies/{company}/timeline', [InteractionController::class, 'timeline'])->name('companies.timeline');
    Route::resource('companies.interactions', InteractionController::class)->shallow();

    Route::resource('companies.quotations', QuotationController::class)->shallow();

    Route::resource('follow-ups', FollowUpController::class);
    Route::patch('follow-ups/{followUp}/complete', [FollowUpController::class, 'complete'])->name('follow-ups.complete');
    Route::patch('follow-ups/{followUp}/skip', [FollowUpController::class, 'skip'])->name('follow-ups.skip');
});

require __DIR__.'/settings.php';
