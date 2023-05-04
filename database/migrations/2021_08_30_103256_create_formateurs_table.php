<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_etab')->unsigned();
            $table->string('titreF');
            $table->string('nomF');
            $table->string('prenomF');
            $table->string('emailF');
            $table->string('tel');
            $table->foreign('id_etab')->references('id')->on('etablissements')
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
        Schema::dropIfExists('formateurs');
    }
}
