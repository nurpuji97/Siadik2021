<?php

namespace Database\Seeders;

use App\Models\Waktu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'jam' => "08.00 - 09.30",
                'jp' => "2",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "08.00 - 10.00",
                'jp' => "3",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "09.30 - 11.00",
                'jp' => "2",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "10.00 - 12.00",
                'jp' => "3",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "09.30 - 11.30",
                'jp' => "3",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "10.00 - 11.30",
                'jp' => "2",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "11.30 - 12.15",
                'jp' => "istirahat",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "12.00 - 12.30",
                'jp' => "istirahat",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "12.15 - 13.45",
                'jp' => "2",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "12.15 - 14.15",
                'jp' => "3",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'jam' => "13.45 - 15.15",
                'jp' => "2",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]

        ];

        DB::table('waktus')->insert($post);
    }
}
