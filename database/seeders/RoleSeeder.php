<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'idc']);
        Role::create(['name' => 'uks']);
        Role::create(['name' => 'dinkes']);
        Role::create(['name' => 'puskesmas']);
        Role::create(['name' => 'siswa']);

        // $user = User::find(1);
        // $user->assignRole('admin');
    }
}
