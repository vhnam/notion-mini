<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware('auth')
    ->name('dashboard');

// Path-based tenant routes
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/tenant/{tenant}', function ($tenant) {
        // Manually initialize tenancy
        $tenantModel = \App\Models\Tenant::find($tenant);
        if (!$tenantModel) {
            abort(404, 'Tenant not found');
        }
        tenancy()->initialize($tenantModel);
        return redirect()->route('tenant.dashboard', ['tenant' => $tenant]);
    })->name('tenant.initialize');
    
    Route::get('/tenant/{tenant}/dashboard', function ($tenant) {
        // Manually initialize tenancy
        $tenantModel = \App\Models\Tenant::find($tenant);
        if (!$tenantModel) {
            abort(404, 'Tenant not found');
        }
        tenancy()->initialize($tenantModel);
        return view('tenant-dashboard', [
            'tenant' => tenant(),
            'tenantId' => tenant('id'),
        ]);
    })->name('tenant.dashboard');
});
