<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokterRole = Role::firstOrCreate(['name' => 'dokter']);

        // Create permissions specific to the doctor role if needed
        // $viewDokterPage = Permission::firstOrCreate(['name' => 'view dokter page']);
        // $manageAppointmentsPermission = Permission::firstOrCreate(['name' => 'manage appointments']);

        // // Assign permissions to the doctor role
        // $dokterRole->givePermissionTo([$viewDoctorPage, $manageAppointmentsPermission]);

        // Create a test user with the "doctor" role
        $dokterRole = User::factory()->create([
            'voornaam' => 'dokter1',
            'achternaam' => 'User',
            'email' => 'dokter@example.com',
            'password' => bcrypt('password123'), // Default password
        ]);
        $dokterRole->assignRole($dokterRole);
    }
}
