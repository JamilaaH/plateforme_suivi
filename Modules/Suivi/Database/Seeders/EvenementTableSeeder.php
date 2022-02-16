<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Suivi\Entities\Evenement;

class EvenementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('evenements')->insert([
            [
                'nom'=>"formation",
                'created_at'=>now(),
            ],
            [
                'nom'=>"hackathon",
                'created_at'=>now(),
            ],
            [
                'nom'=>"workshop",
                'created_at'=>now(),
            ],
        ]); 

        // $this->call("OthersTableSeeder");
    }
}
