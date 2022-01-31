<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonApprovisionnementsArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_approvisionnements_articles', function (Blueprint $table) {
            $table->foreignId('bon_a_id')->references('id')->on('bon_approvisionnements');
            $table->foreignId('article_id')->references('id')->on('articles');
            $table->primary(['bon_a_id', 'article_id']);
            $table->integer('quantite');
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
        Schema::dropIfExists('bon_approvisionnements_articles');
    }
}
