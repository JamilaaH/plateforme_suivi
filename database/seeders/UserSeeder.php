<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "nom"           =>  "Primo",
                "role_id"       =>  1,
                "email"         =>  "nicolas@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Ayhan",
                "role_id"       =>  2,
                "email"         =>  "ayhan@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Elias",
                "role_id"       =>  2,
                "email"         =>  "elias@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
        ]);

    }
}
