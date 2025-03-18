<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable(); // Afegir la columna updated_at
        });
    }
    
    public function down()
    {
        Schema::table('productes', function (Blueprint $table) {
            $table->dropColumn('updated_at'); // Eliminar la columna updated_at
        });
    }
    
};
