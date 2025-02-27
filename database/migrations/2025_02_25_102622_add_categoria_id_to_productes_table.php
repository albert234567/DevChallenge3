<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaIdToProductesTable extends Migration
{
    public function up()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->foreignId('categoria_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
        });
    }
}
