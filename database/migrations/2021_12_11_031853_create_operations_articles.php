<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations_articles', function (Blueprint $table) {
            $table->foreignId('operation_id')->references('id')->on('operations');
            $table->foreignId('article_id')->references('id')->on('articles');
            $table->primary(['operation_id', 'article_id']);
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
        Schema::dropIfExists('operations_articles');
    }
}
