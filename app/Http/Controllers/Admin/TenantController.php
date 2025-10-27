<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;

class TenantController extends Controller
{
    /**
     * Display a listing of the tenants (Read-only for Super Admin).
     */
    public function index()
    {
        $tenants = Tenant::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Display the specified tenant (Read-only for Super Admin).
     */
    public function show(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        $user = null;

        if (isset($tenant->data['user_id'])) {
            $user = User::find($tenant->data['user_id']);
        }

        return view('admin.tenants.show', compact('tenant', 'user'));
    }
}
