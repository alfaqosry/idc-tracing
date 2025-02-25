<?php

namespace Database\Factories;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Mengaitkan dengan factory User
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->city(),
            'suku_id' => \App\Models\Suku::factory(), // Mengaitkan dengan factory Suku
            'sekolah_id' => \App\Models\Sekolah::factory(), // Mengaitkan dengan factory Sekolah
            'nisn' => $this->faker->unique()->numerify('##########'), // 10-digit NISN
            'tahunajaranmasuk' => $this->faker->randomElement(['2020/2021', '2021/2022', '2022/2023']),
            'no_hp' => $this->faker->optional()->phoneNumber(),
            'alamat' => $this->faker->optional()->address(),


        ];
    }
}