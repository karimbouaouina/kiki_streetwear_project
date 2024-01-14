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
    Schema::table('article', function (Blueprint $table) {
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->integer('quantity');
        $table->string('status');
        $table->unsignedBigInteger('sizeID')->nullable();
        $table->unsignedBigInteger('colorID')->nullable();

        $table->foreign('sizeID')->references('sizeID')->on('size')->onDelete('set null');
        $table->foreign('colorID')->references('colorID')->on('color')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function (Blueprint $table) {
            //
        });
    }
};
