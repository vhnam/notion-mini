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

// Super Admin Routes (Read-only access)
Route::middleware(['auth', 'super_admin'])->prefix('system')->name('system.')->group(function () {
    Route::get('tenants', [\App\Http\Controllers\Admin\TenantController::class, 'index'])->name('tenants.index');
    Route::get('tenants/{id}', [\App\Http\Controllers\Admin\TenantController::class, 'show'])->name('tenants.show');
});

// Regular User Routes (Manage their own tenant)
Route::middleware(['auth'])->prefix('my-tenant')->name('my-tenant.')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserTenantController::class, 'show'])->name('show');
    Route::get('/edit', [\App\Http\Controllers\UserTenantController::class, 'edit'])->name('edit');
    Route::put('/update', [\App\Http\Controllers\UserTenantController::class, 'update'])->name('update');
    Route::delete('/destroy', [\App\Http\Controllers\UserTenantController::class, 'destroy'])->name('destroy');
});

