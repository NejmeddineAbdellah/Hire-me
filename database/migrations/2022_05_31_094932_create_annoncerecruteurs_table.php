<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncerecruteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annoncerecruteurs', function (Blueprint $table) {
            $table->id();
            $table->double('salaire');
            $table->unsignedBigInteger('annonce_id');
            $table->unsignedBigInteger('user_id');
            $table->string('contrat');
            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('annoncerecruteurs');
    }
}
