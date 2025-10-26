<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();

    // Super Admin sees system dashboard
    if ($user->hasRole('Super Admin')) {
        return view('modules.dashboard.system.dashboard');
    }

    // Regular users see home dashboard
    return view('modules.dashboard.home.dashboard');
})
    ->middleware('auth')
    ->name('dashboard');

