<?php

namespace Database\Factories;

use App\Models\Kejuruan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KejuruanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kejuruan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_kejuruan' => $this->faker->randomElement(array('K001', 'K002', 'K003', 'K004', 'K005')),
            'nama_kejuruan' => $this->faker->randomElement(array('TKJ', 'Akutansi', 'TKR', 'Elektro', 'AP'))
        ];
    }
}
