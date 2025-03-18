<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->boolean('completat')->default(false);  // Afegir el camp completat
        });
    }
    
    public function down()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->dropColumn('completat');
        });
    }
    
};
