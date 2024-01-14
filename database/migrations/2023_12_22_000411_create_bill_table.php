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
    Schema::create('bill', function (Blueprint $table) {
        $table->bigIncrements('billID');
        $table->string('name');
        $table->string('address');
        $table->timestamp('billingDate')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->string('taxRegistrationNumber');
        $table->unsignedBigInteger('orderID');
        $table->foreign('orderID')->references('orderID')->on('order')->onDelete('cascade');
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
        Schema::dropIfExists('bill');
    }
};
