<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruangan = [
            [
                'kode_kejuruan' => "R001",
                'nama_kejuruan' => "kelas 01"
            ],
            [
                'kode_kejuruan' => "R002",
                'nama_kejuruan' => "kelas 02"
            ],
            [
                'kode_kejuruan' => "R003",
                'nama_kejuruan' => "kelas 03"
            ],
            [
                'kode_kejuruan' => "R004",
                'nama_kejuruan' => "kelas 04"
            ],
            [
                'kode_kejuruan' => "R005",
                'nama_kejuruan' => "kelas 05"
            ]
        ];

        DB::table('ruangan')->insert($ruangan);
    }
}
