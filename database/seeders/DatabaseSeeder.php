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
        $this->call(RollenSeeder::class); // Voeg dit toe om de RollenSeeder uit te voeren

        // Maak de rol "admin" als deze nog niet bestaat
       $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Maak de permissies aan
       $ViewAdminPage = Permission::firstOrCreate(['name' => 'view Admin Page']);
        $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);

        // Ken permissies toe aan de rol
        $adminRole->givePermissionTo($ViewAdminPage);
        $adminRole->givePermissionTo($manageUsersPermission);

        // Maak een testgebruiker aan en wijs de rol toe
        $user = User::factory()->create([
            'gebruikers_id' => '1', // Zorg voor een unieke gebruikers ID
            'voornaam' => 'Admin',
            'achternaam' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Stel een standaard wachtwoord in
        ]); 
        
        
    }
    
}
