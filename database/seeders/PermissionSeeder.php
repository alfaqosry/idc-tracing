<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Admin Permission
        Permission::insert([
            ['name' => 'create user', 'guard_name' => 'web'],
            ['name' => 'read user', 'guard_name' => 'web'],
            ['name' => 'update user', 'guard_name' => 'web'],
            ['name' => 'delete user', 'guard_name' => 'web'],
        ]);

        // Assign Permission
        // $role = Role::find(1);
        // $role->giveAllPermissions();

    }
}
