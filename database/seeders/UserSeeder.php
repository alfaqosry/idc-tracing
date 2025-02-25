<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambah Data User Bersama Role
        User::create([
            'name' => 'IDC ADMIN',
            'username' => 'admin',
            'email' => 'idcadmin@gmail.com',
            'password' => bcrypt('password'),
            
        ])->assignRole('idc');

       
        
    }
}
