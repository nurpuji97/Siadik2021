<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::factory(100)->create();
    }
}
