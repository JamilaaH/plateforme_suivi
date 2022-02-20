<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeanceCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seance_id')->constrained();
            $table->foreignId('candidat_id')->constrained();
            $table->boolean('presence');
            $table->boolean('inscrit');
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
        Schema::dropIfExists('seance_candidats');
    }
}
