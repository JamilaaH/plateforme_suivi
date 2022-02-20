<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('limite');
            $table->integer('max');
            $table->string('lieu');
            $table->boolean('etat');
            $table->unsignedBigInteger('evenement_type_id');
            $table->foreign('evenement_type_id')->references('id')->on('evenement_types')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->unsignedBigInteger('etape_id');
            $table->foreign('etape_id')->references('id')->on('etapes')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
