<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesProTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences_pro', function (Blueprint $table) {
            $table->increments("id_experience_pro");
            $table->string("intitule_expe");
            $table->string("description_expe")->nullable();
            $table->string("domaine");
            $table->string("sous_dom_cat")->nullable();
            $table->string("type_contrat")->nullable();
            $table->string("ville_expe");
            $table->string("pays_expe");
            $table->date("date_deb_expe");
            $table->date("date_fin_expe");
            $table->string("entreprise");
            $table->UnsignedInteger("candidat");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences_pro');
    }
}
