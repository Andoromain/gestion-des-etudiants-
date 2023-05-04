<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploisdutempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploisdutemps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_frtion')->unsigned();
            $table->integer('id_etab')->unsigned();
            $table->integer('id_frteur')->unsigned();
            $table->integer('id_parc')->unsigned();
            $table->date('jour');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->string('couleur');

            $table->foreign('id_etab')->references('id')->on('etablissements')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_frtion')->references('id')->on('formations')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_frteur')->references('id')->on('formateurs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_parc')->references('id')->on('parcours')
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
        Schema::dropIfExists('emploisdutemps');
    }
}
