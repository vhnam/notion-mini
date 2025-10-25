<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Path-based tenancy routes for accessing tenant areas.
|
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/tenant/{tenant}', function ($tenant) {
        // Initialize tenancy and redirect to dashboard
        initializeTenancy($tenant);
        return redirect()->route('tenant.dashboard', ['tenant' => $tenant]);
    })->name('tenant.initialize');

    Route::get('/tenant/{tenant}/dashboard', function ($tenant) {
        // Initialize tenancy and show dashboard
        initializeTenancy($tenant);
        return view('tenant-dashboard', [
            'tenant' => tenant(),
            'tenantId' => tenant('id'),
        ]);
    })->name('tenant.dashboard');
});

/**
 * Initialize tenancy for the given tenant ID
 */
function initializeTenancy(string $tenantId): void
{
    $tenant = \App\Models\Tenant::findOrFail($tenantId);
    tenancy()->initialize($tenant);
}
