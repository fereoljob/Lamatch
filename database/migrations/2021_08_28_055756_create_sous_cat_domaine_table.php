<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousCatDomaineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_cat_domaine', function (Blueprint $table) {
            $table->increments("id_sous_dom");
            $table->string("intitule_sous_dom");
            $table->unsignedInteger("domaine_metier");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sous_cat_domaine');
    }
}
