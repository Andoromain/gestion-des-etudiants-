<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_etab')->unsigned();
            $table->integer('id_formation')->unsigned();

            $table->string('matricule',20)->unique();
            $table->string('nomEt',200);
            $table->string('prenomEt',200);
            $table->date('datenaiss');
            $table->string('emailEt',200);
            $table->string('logEt',10);
            /*fichier
            $table->string('certificatMed');
            $table->string('actNaiss');
            $table->string('CIN');
            $table->string('diplome');
            $table->string('bordereau');
            */
            $table->string('photo');
            $table->float('fraisSco');
            $table->string('sexe',10);

           
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
        Schema::dropIfExists('etudiants');
    }
}
