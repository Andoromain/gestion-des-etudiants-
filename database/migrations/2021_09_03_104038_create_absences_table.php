<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_etudiant')->unsigned();
            $table->integer('id_syllabus')->unsigned();
            
            
            $table->foreign('id_syllabus')->references('id')->on('syllabus')
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
        Schema::dropIfExists('absences');
    }
}
