<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'agama' => $this->faker->randomElement(array('Islam', 'Kristen', 'katolik', 'Hindu', 'Budha')),
            'alamat' => $this->faker->address,
            'nohp' => $this->faker->phoneNumber
        ];
    }
}
