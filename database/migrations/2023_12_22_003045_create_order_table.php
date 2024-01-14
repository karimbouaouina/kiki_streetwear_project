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
    Schema::create('order', function (Blueprint $table) {
        $table->bigIncrements('orderID');
        $table->timestamp('orderDate')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->unsignedBigInteger('userID'); // This will reference the users table
        $table->foreign('userID')->references('userID')->on('user')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::table('order', function (Blueprint $table) {
        $table->dropForeign(['userID']); // Drop foreign key constraint
    });
    Schema::dropIfExists('order');
}
};
