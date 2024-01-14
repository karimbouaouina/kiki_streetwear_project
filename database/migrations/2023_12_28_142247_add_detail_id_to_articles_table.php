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
        // Add detailID column
        $table->unsignedBigInteger('detailID')->nullable()->after('articleID');

        // Add foreign key constraint
        $table->foreign('detailID')->references('detailID')->on('detail')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('article', function (Blueprint $table) {
        // Drop foreign key constraint
        $table->dropForeign(['detailID']);
        
        // Drop detailID column
        $table->dropColumn('detailID');
    });
}

};
