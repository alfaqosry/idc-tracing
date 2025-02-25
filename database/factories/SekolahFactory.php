<?php

namespace Database\Factories;
use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    protected $model = Sekolah::class;

    public function definition(): array
    {
        return [
            'nama_sekolah' => $this->faker->company() . ' School', 
            'kec' => $this->faker->citySuffix(),     
            'npsn' => $this->faker->numerify('########'),              
        ];
    }
}
