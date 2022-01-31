<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetConstructions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_constructions', function (Blueprint $table) {
            $table->id();
            $table->string('etat');
            $table->string('adresse');
            $table->foreignId('client_id')->references('user_id')->on('clients');
            $table->date('date_demarrage');

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
        Schema::dropIfExists('projet_constructions');
    }
}
