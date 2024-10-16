<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
    
// zet rollen in roles tabel 
class RollenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ["name" => "admin", "guard_name" => "web"],
            ["name" => "client", "guard_name" => "web"],
            ["name" => "dokter", "guard_name" => "web"]
        ]);
    }
}

