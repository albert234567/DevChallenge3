<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlistaProducteTable extends Migration
{
    public function up()
    {
        Schema::create('llista_producte', function (Blueprint $table) {
            $table->id();
            $table->foreignId('llista_id')->constrained('llistas')->onDelete('cascade');
            $table->foreignId('producte_id')->constrained('productes')->onDelete('cascade');
            $table->integer('quantitat')->default(1); // Afegit per guardar la quantitat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('llista_producte');
    }
}
