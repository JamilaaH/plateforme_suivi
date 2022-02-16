<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvenementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('evenement_types')->insert([
            [
                "nom"=>"coding school 16",
                'evenement_id'=>1, //school
                'created_at'=>now(),
            ],
            [
                "nom"=>"webmaster 4",
                'created_at'=>now(),
                'evenement_id'=>1, //school
            ],
            [
                "nom"=>"Coding School 19",
                'created_at'=>now(),
                'evenement_id'=>1, //school
            ],
        ]); 

        // $this->call("OthersTableSeeder");
    }
}
