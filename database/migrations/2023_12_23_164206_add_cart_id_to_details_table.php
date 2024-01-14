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
    Schema::table('detail', function (Blueprint $table) {
        $table->unsignedBigInteger('cart_id')->nullable();
        $table->foreign('cart_id')->references('cartID')->on('cart');
    });
}

// Don't forget to create a down method for rollback
public function down()
{
    Schema::table('detail', function (Blueprint $table) {
        $table->dropForeign(['cart_id']);
        $table->dropColumn('cart_id');
    });
}
};
