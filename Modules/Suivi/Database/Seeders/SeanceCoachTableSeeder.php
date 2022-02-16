<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeanceCoachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('seance_coach')->insert([
            [
                'seance_id'=> 10,
                'user_id'=>3,    
            ]

        ]);
        // $this->call("OthersTableSeeder");
    }
}
