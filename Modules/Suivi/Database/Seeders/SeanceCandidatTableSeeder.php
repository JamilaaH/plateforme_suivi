<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeanceCandidatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('seance_candidats')->insert([
            [
                "candidat_id" =>1,
                "seance_id"=>1,
                "presence"=>1,
                "inscrit"=>1,
                'deleted_at'=>null,
            ],
            [
                "candidat_id" =>2,
                "seance_id"=>1,
                "presence"=>1,
                "inscrit"=>1,
                'deleted_at'=>null,

            ],

        ]);
        // $this->call("OthersTableSeeder");
    }
}
