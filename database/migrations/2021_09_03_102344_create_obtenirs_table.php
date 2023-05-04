<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObtenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obtenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_evt')->unsigned();
            $table->integer('id_etudiant')->unsigned();
            
            $table->foreign('id_evt')->references('id')->on('evenements')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_etudiant')->references('id')->on('etudiants')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('obtenirs');
    }
}
