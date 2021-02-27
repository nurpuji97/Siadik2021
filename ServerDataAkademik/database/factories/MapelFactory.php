<?php

namespace Database\Factories;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\Factory;

class MapelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mapel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_mapel' => $this->faker->randomElement(array('PP001', 'PP002', 'PP003', 'PP004', 'PP005')),
            'nama_mapel' => $this->faker->randomElement(array('Bahasa Indonesia', 'Matematika', 'IPA', 'IPS', 'Fisika'))
        ];
    }
}
