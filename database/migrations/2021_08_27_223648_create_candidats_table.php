<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->increments("id_candidat");
            $table->string("nom");
            $table->string("prenom");
            $table->boolean("recherche")->default(0);
            $table->string("email");
            $table->date("date_naissance")->nullable();
            $table->string("photo_de_profil")->nullable();
            $table->UnsignedInteger("niv_etude")->nullable();
            $table->string("LinkedIn")->nullable();
            $table->string("region")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
