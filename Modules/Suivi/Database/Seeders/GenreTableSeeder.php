<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('genres')->insert([
            [
                "nom"           =>  "Femme",
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Homme",
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "Autre",
                "created_at"    =>  now(),
            ],
        ]);

        // $this->call("OthersTableSeeder");
    }
}
