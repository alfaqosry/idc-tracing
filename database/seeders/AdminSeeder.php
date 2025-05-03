<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Buat user terlebih dahulu
       $user = User::create([
        'name' => 'Admin Sistem',
        'username' => 'admin',
        'email' => 'admin1@example.com',
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
    ]);

    $user->assignRole('idc');

    // Buat admin dengan relasi ke user
    Admin::create([
        'user_id' => $user->id,
        'jenis_kelamin' => 'Laki-laki',
        'tanggal_lahir' => '1990-01-01',
        'tempat_lahir' => 'Jakarta',
        'no_hp' => '081234567890',
        'alamat' => 'Jl. Contoh No.1, Jakarta',
    ]);

    
    }
}
