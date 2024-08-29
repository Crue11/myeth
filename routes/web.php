<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::middleware('guest')->group(function () {
   // landing page
   Route::get('/', [LandingController::class, 'landingPage'])->name('landingPage');

   Route::get('/completion_of_10', [LandingController::class, 'completionPage'])->name('completionPage');

   Route::get('/learn', [LandingController::class, 'symbolPage'])->name('symbolPage');
   Route::get('/learn/numbers', [LandingController::class, 'learn'])->name('symbol.learn');
   Route::get('/learn/test', [LandingController::class, 'test'])->name('symbol.test');
});
