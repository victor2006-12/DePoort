<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the "admin" role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // // Create permissions for admin
        $viewAdminPage = Permission::firstOrCreate(['name' => 'view admin page']);
         $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);

        // // Assign permissions to the admin role
         $adminRole->givePermissionTo([$viewAdminPage, $manageUsersPermission]);

        // Create a test user with the "admin" role
        $adminUser = User::factory()->create([
            'voornaam' => 'Admin',
            'achternaam' => 'User',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password123'), // Default password
        ]);
        $adminUser->assignRole($adminRole);

        // Create the "doctor" role if it doesn't exist

    }
}
