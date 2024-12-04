<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('productes', function (Blueprint $table) {
        $table->foreignId('llista_id')->nullable()->constrained('llistas')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('productes', function (Blueprint $table) {
        $table->dropForeign(['llista_id']);
        $table->dropColumn('llista_id');
    });
}

};
