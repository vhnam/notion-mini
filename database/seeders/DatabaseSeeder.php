<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles and permissions first
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);

        // Create a super admin user
        $user = User::factory()->create([
            'name' => 'Vincent Wu',
            'email' => 'sa@example.com',
        ]);

        // Assign Super Admin role to test user
        $user->assignRole('Super Admin');
    }
}
