<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateFonctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typefonction',100)->unique();
            $table->timestamps();
        });
        DB::table('fonctions')->insert([
            'typefonction' => 'admin',//su
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fonctions')->insert([
            'typefonction' => 'chef',//admin
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fonctions')->insert([
            'typefonction' => 'comptable',//user
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonctions');
    }
}
