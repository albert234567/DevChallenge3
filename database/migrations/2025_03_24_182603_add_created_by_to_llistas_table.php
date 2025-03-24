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
        Schema::table('llistas', function (Blueprint $table) {
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('llistas', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
    };
