<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = [
            [
                'kode_kejuruan' => "PP001",
                'nama_kejuruan' => "Bahasa Indonesia"
            ],
            [
                'kode_kejuruan' => "PP002",
                'nama_kejuruan' => "Matematika"
            ],
            [
                'kode_kejuruan' => "PP003",
                'nama_kejuruan' => "IPA"
            ],
            [
                'kode_kejuruan' => "PP004",
                'nama_kejuruan' => "IPS"
            ],
            [
                'kode_kejuruan' => "PP005",
                'nama_kejuruan' => "Fisika"
            ]
        ];

        DB::table('mapels')->insert($mapel);
    }
}
