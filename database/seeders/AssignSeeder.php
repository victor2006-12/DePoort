<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = User::find(2);
        $dokter = User::find(3);

        $dokter->assignRole('dokter');
        $Admin->assignRole('admin');
    }
}
