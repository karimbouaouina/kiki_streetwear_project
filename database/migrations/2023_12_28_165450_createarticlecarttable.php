<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_cart', function (Blueprint $table) {
            $table->unsignedBigInteger('articleID');
            $table->unsignedBigInteger('cartID');
            $table->integer('quantity');
            
            $table->foreign('articleID')->references('articleID')->on('article')->onDelete('cascade');
            $table->foreign('cartID')->references('cartID')->on('cart')->onDelete('cascade');

            $table->primary(['articleID', 'cartID']);
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_cart');
    }
};
