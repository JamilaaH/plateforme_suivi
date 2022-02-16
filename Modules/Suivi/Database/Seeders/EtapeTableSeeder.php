<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EtapeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('etapes')->insert([
            [
                'nom'=>"séance d'information", 
                'ordre'=>'1',
                "evenement_id"=>1,
                "created_at"=>now(),
            ],
            [
                'nom'=>"interview", 
                'ordre'=>'2',
                "evenement_id"=>1,
                "created_at"=>now(),
            ],
            [
                'nom'=>"week", 
                'ordre'=>'3',
                "evenement_id"=>1,
                "created_at"=>now(),
            ],

        ]);

        // $this->call("OthersTableSeeder");
    }
}
