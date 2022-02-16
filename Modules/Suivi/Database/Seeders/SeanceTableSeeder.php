<?php

namespace Modules\Suivi\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('seances')->insert([
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '31'),
                'date_fin' => Carbon::createFromDate('2022', '8', '31'),
                'limite' => 17,
                'max'=> 20,
                'etat' => 1,
                "lieu" => 'En Ligne',
                'etape_id' => 1,
                'evenement_type_id' => 1,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '15'),
                'date_fin' => Carbon::createFromDate('2022', '8', '15'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'En Ligne',
                'etape_id' => 1,
                'evenement_type_id' => 1,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '21'),
                'date_fin' => Carbon::createFromDate('2022', '8', '21'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'En Ligne',
                'etape_id' => 1,
                'evenement_type_id' => 1,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '10'),
                'date_fin' => Carbon::createFromDate('2022', '8', '10'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'En Ligne',
                'etape_id' => 1,
                'evenement_type_id' => 3,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '12'),
                'date_fin' => Carbon::createFromDate('2022', '8', '12'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'MolenGeek',
                'etape_id' => 1,
                'evenement_type_id' => 2,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '21'),
                'date_fin' => Carbon::createFromDate('2022', '8', '21'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'MolenGeek',
                'etape_id' => 1,
                'evenement_type_id' => 2,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '25'),
                'date_fin' => Carbon::createFromDate('2022', '8', '25'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'MolenGeek',
                'etape_id' => 1,
                'evenement_type_id' => 2,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '09', '02'),
                'date_fin' => Carbon::createFromDate('2022', '09', '02'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'En Ligne',
                'etape_id' => 2,
                'evenement_type_id' => 1,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '7', '29'),
                'date_fin' => Carbon::createFromDate('2022', '7', '29'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                'etape_id' => 2,
                "lieu" => 'En Ligne',
                'evenement_type_id' => 2,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '4'),
                'date_fin' => Carbon::createFromDate('2022', '8', '10'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                'etape_id' => 3,
                "lieu" => 'MolenGeek',
                'evenement_type_id' => 1,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '8', '28'),
                'date_fin' => Carbon::createFromDate('2022', '8', '28'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'MolenGeek',
                'etape_id' => 1,
                'evenement_type_id' => 2,
                "created_at" => now()
            ],
            [
                'heure_debut' => Carbon::createFromTime('9', "00", '00'),
                'heure_fin' => Carbon::createFromTime('12', "00", "00"),
                'date_debut' => Carbon::createFromDate('2022', '9', '5'),
                'date_fin' => Carbon::createFromDate('2022', '9', '5'),
                'limite' => 20,
                'max'=>20,
                'etat' => 1,
                "lieu" => 'MolenGeek',
                'etape_id' => 1,
                'evenement_type_id' => 3,
                "created_at" => now()
            ],

        ]);

        // $this->call("OthersTableSeeder");
    }
}
