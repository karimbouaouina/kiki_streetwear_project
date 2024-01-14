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
    Schema::create('detail', function (Blueprint $table) {
        $table->bigIncrements('detailID');
        $table->decimal('price', 8, 2); // 8 digits total, 2 after the decimal
        $table->unsignedBigInteger('quantity');
        $table->unsignedBigInteger('articleID');
        $table->unsignedBigInteger('sizeID');
        $table->unsignedBigInteger('colorID');
        $table->string('status');
        $table->foreign('articleID')->references('articleID')->on('article')->onDelete('cascade');
        $table->foreign('sizeID')->references('sizeID')->on('size');
        $table->foreign('colorID')->references('colorID')->on('color');
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
        Schema::dropIfExists('detail');
    }
};
