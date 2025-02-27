<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('productes')) {
            Schema::create('productes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }
    }
    
    
    public function down()
    {
        Schema::table('productes', function (Blueprint $table) {
            // Restablir la columna per no permetre NULL
            $table->unsignedBigInteger('categoria_id')->nullable(false)->change();
        });
    }
    
};
