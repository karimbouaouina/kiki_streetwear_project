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
    Schema::create('detail_article_order', function (Blueprint $table) {
        $table->unsignedBigInteger('orderID');
        $table->unsignedBigInteger('detailID');
        $table->integer('quantity');
        $table->decimal('sellingPrice', 8, 2);
        $table->primary(['orderID', 'detailID']);
        $table->foreign('orderID')->references('orderID')->on('order')->onDelete('cascade');
        $table->foreign('detailID')->references('detailID')->on('detail')->onDelete('cascade');
        // This table doesn't need timestamps unless you specifically want to track when these relationships are created/updated
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailarticleorder');
    }
};
