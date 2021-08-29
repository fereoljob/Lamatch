<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments("id_entre");
            $table->string("nom_entre");
            $table->string("logo_entre")->nullable();
            $table->date("date_crea")->nullable();
            $table->string("site_web")->nullable();
            $table->string("email");
            $table->string("presentation")->nullable();
            $table->integer("effectifs")->nullable();
            $table->unsignedInteger("domaine_metier")->nullable();      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprise');
    }
}
