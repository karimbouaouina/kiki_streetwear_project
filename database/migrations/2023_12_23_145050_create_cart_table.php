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
    Schema::create('cart', function (Blueprint $table) { // Use 'cart' instead of 'cart'
        $table->bigIncrements('cartID');
        $table->unsignedBigInteger('detailID');
        $table->unsignedBigInteger('userID'); // This should match the primary key of the 'users' table
        $table->integer('quantity');
        $table->decimal('sellingPrice', 8, 2);
        $table->foreign('detailID')->references('detailID')->on('detail')->onDelete('cascade'); // Assuming 'details' is the correct table name
        $table->foreign('userID')->references('userID')->on('user')->onDelete('cascade'); // 'id' is the default primary key column name for the 'users' table
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cart'); // Use 'cart' instead of 'cart'
}

};
