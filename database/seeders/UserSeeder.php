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
                "email"         =>  "nicolas@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Ayhan",
                "email"         =>  "ayhan@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Elias",
                "email"         =>  "elias@molengeek.com",
                "password"      =>  Hash::make("password"),
                "created_at"    =>  now(),
            ],
        ]);

    }
}
