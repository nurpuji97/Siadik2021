<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuanganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ruangan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_ruangan' => $this->faker->randomElement(array('R001', 'R002', 'R003', 'R004', 'R005', 'R006')),
            'nama_ruangan' => $this->faker->randomElement(array('kelas 01', 'kelas 02', 'kelas 03', 'kelas 04', 'kelas 05'))
        ];
    }
}
