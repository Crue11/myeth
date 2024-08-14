<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::middleware('guest')->group(function () {
   // landing page
   Route::get('/', [LandingController::class, 'index'])->name('landing.index');
});
