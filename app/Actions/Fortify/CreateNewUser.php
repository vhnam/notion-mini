<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Create a tenant for the user
        $this->createTenantForUser($user);

        return $user;
    }

    /**
     * Create a tenant for the newly registered user.
     */
    protected function createTenantForUser(User $user): void
    {
        // Generate a unique tenant ID based on user email
        $tenantId = $user->getTenantId();

        // Create the tenant using the proper tenancy method
        $tenant = Tenant::create([
            'id' => $tenantId,
            'data' => [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'created_at' => now()->toISOString(),
            ],
        ]);

        // No domain creation - tenant will be identified by other means
        // (e.g., path-based tenancy, request data, or manual tenant switching)
    }
}
