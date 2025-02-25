<?php

namespace Database\Factories;
use App\Models\Suku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suku>
 */
class SukuFactory extends Factory
{
    protected $model = Suku::class;

    public function definition(): array
    {
        return [
            'nama_suku' => $this->faker->unique()->word(), 
            'daerah' => $this->faker->city(),               
        ];
    }
}
