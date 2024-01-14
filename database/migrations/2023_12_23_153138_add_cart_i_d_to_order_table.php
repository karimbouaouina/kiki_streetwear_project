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
        Schema::table('order', function (Blueprint $table) {
            $table->unsignedBigInteger('cartID')->nullable()->after('orderID'); // Place it after the 'id' column or wherever you prefer

            $table->foreign('cartID')->references('cartID')->on('cart')
                  ->onDelete('set null') // or 'cascade', if you want to delete the order when the cart is deleted
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['cartID']);
            $table->dropColumn('cartID');
        });
    }
};
