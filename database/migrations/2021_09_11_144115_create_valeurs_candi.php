<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValeursCandi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valeurs_candi', function (Blueprint $table) {
            $table->increments("id_valeur");
            $table->string("valeur");
            $table->UnsignedInteger("id_candidat");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valeurs_candi');
    }
}
