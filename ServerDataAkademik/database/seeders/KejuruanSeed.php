<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KejuruanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kejuruan = [
            [
                'kode_kejuruan' => "K001",
                'nama_kejuruan' => "TKJ"
            ],
            [
                'kode_kejuruan' => "K002",
                'nama_kejuruan' => "Akutansi"
            ],
            [
                'kode_kejuruan' => "K003",
                'nama_kejuruan' => "TKR"
            ],
            [
                'kode_kejuruan' => "K004",
                'nama_kejuruan' => "Elektro"
            ],
            [
                'kode_kejuruan' => "K005",
                'nama_kejuruan' => "AP"
            ]
        ];

        DB::table('kejuruans')->insert($kejuruan);
    }
}
