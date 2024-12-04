<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlistaUserTable extends Migration
{
    public function up()
    {
        Schema::create('llista_user', function (Blueprint $table) {
            $table->id(); // ID de la taula
            $table->foreignId('llista_id')->constrained()->onDelete('cascade'); // Referencia a llista
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Referencia a usuari
            $table->timestamps(); // Campos created_at i updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('llista_user'); // Eliminar la tabla si existeix
    }
}
