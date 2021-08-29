<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments("id_forma");
            $table->string("intitule_forma");
            $table->string("description_forma");
            $table->string("domaine");
            $table->string("sous_dom_cat");
            $table->string("niv_etude");
            $table->string("ville_forma");
            $table->string("pays_forma");
            $table->date("date_deb_forma");
            $table->date("date_fin_forma");
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
        Schema::dropIfExists('formations');
    }
}
