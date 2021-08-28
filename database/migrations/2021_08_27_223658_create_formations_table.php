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
            $table->string("intitulé_forma");
            $table->string("description_forma");
            $table->unsignedInteger("domaine_metier");
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
