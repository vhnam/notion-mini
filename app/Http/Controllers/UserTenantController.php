<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserTenantController extends Controller
{
    /**
     * Get the tenant for the current user
     */
    private function getUserTenant()
    {
        $user = auth()->user();

        // Find tenant where user_id in data matches current user
        $tenant = Tenant::whereJsonContains('data->user_id', $user->id)->first();

        if (!$tenant) {
            abort(404, 'No tenant found for your account.');
        }

        return $tenant;
    }

    /**
     * Display the user's tenant details.
     */
    public function show()
    {
        $tenant = $this->getUserTenant();
        $user = auth()->user();

        return view('user.tenant.show', compact('tenant', 'user'));
    }

    /**
     * Show the form for editing the user's tenant.
     */
    public function edit()
    {
        $tenant = $this->getUserTenant();
        $user = auth()->user();

        return view('user.tenant.edit', compact('tenant', 'user'));
    }

    /**
     * Update the user's tenant in storage.
     */
    public function update(Request $request)
    {
        $tenant = $this->getUserTenant();

        $validated = $request->validate([
            'tenant_id' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9-]+$/',
                Rule::unique('tenants', 'id')->ignore($tenant->id),
            ],
        ]);

        try {
            // Update tenant ID if changed
            if ($validated['tenant_id'] !== $tenant->id) {
                // For now, we'll keep this simple
                // In production, you'd need to handle schema/database renaming
                $oldId = $tenant->id;
                $tenant->id = $validated['tenant_id'];
                $tenant->save();
            }

            return redirect()
                ->route('my-tenant.show')
                ->with('success', 'Tenant updated successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update tenant: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the user's tenant from storage.
     */
    public function destroy()
    {
        $tenant = $this->getUserTenant();

        try {
            // Delete the tenant (this will also drop the schema if configured)
            $tenant->delete();

            // Log out the user since their tenant is deleted
            auth()->logout();

            return redirect()
                ->route('home')
                ->with('success', 'Your tenant has been deleted successfully.');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Failed to delete tenant: ' . $e->getMessage()]);
        }
    }
}
