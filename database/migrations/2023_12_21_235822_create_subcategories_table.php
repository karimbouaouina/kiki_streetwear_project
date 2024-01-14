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
    Schema::create('subcategory', function (Blueprint $table) {
        $table->bigIncrements('subcategoryID');
        $table->string('subcategoryName');
        $table->unsignedBigInteger('categoryID');
        $table->foreign('categoryID')->references('categoryID')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('subcategory');
    }
};
