<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pegawai::class;

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
            'jenis_kelamin' => $this->faker->randomElement(array('pria', 'wanita')),
            'avatar' => $this->faker->randomElement(array('baseline_person_black_48dp.png')),
            'alamat' => $this->faker->address,
            'nohp' => $this->faker->phoneNumber
        ];
    }
}
