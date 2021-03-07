<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => "admin",
            'role' => "admin",
            'email' => "admin@test.com",
            'password' => bcrypt('rahasia'),
            'remember_token' => Str::random(60)
        ];

        DB::table('users')->insert($user);
    }
}
