<?php

namespace Modules\Suivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SuiviDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            EvenementTableSeeder::class,
            EvenementTypeTableSeeder::class,
            EtapeTableSeeder::class,
            SeanceTableSeeder::class,
            SeanceCoachTableSeeder::class,
            SeanceCandidatTableSeeder::class,
        ]);
        // $this->call("OthersTableSeeder");
    }
}
