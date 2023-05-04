<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_formation')->unsigned();
            $table->integer('id_etab')->unsigned();
            $table->string('nomEvt');
            $table->date('jour');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->string('couleur');

            $table->foreign('id_etab')->references('id')->on('etablissements')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_formation')->references('id')->on('formations')
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
        Schema::dropIfExists('evenements');
    }
}
