<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByToLlistesTable extends Migration
{
    /**
     * Afegeix la columna 'created_by' a la taula 'llistas'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('llistas', function (Blueprint $table) {
            // Afegim la columna 'created_by' com una clau forana a la taula 'users'
            $table->unsignedBigInteger('created_by')->nullable(); // La fem nullable per si ja hi ha llistes que no tenen creador
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade'); // Relació amb 'users'
        });
    }

    /**
     * Elimina la columna 'created_by' a la taula 'llistas'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('llistas', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
}
