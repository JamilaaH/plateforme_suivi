<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('roles')->insert([
            [
                "nom"           =>  "admin",
                "created_at"    =>  now(),
            ],
            [
                "nom"           =>  "partenaire",
                "created_at"    =>  now(),
            ],

            [
                "nom"           =>  "coach",
                "created_at"    =>  now(),
            ],

        ]);

        // $this->call("OthersTableSeeder");
    }
}
