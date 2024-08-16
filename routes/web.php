<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::middleware('guest')->group(function () {
   // landing page
   Route::get('/', [LandingController::class, 'landingPage'])->name('landingPage');

   Route::get('/completion_of_10', [LandingController::class, 'completionPage'])->name('completionPage');

   Route::get('/numbers_symbol', [LandingController::class, 'symbolPage'])->name('symbolPage');
});
