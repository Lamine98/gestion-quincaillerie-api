<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->date('date_livraison');
            $table->string('etat_livraison');
            $table->string('adresse_livraison');
            $table->foreignId('client_id')->references('user_id')->on('clients');
            $table->foreignId('livreur_id')->references('id')->on('livreurs');
            $table->foreignId('construction_id')->references('id')->on('projet_constructions');
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
        Schema::dropIfExists('operations');
    }
}
