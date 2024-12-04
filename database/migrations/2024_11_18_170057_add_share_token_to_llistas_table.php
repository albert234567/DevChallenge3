<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddShareTokenToLlistasTable extends Migration
{
    public function up()
    {
        Schema::table('llistas', function (Blueprint $table) {
            $table->string('share_token', 64)->nullable()->unique()->after('name');
        });
    }

    public function down()
    {
        Schema::table('llistas', function (Blueprint $table) {
            $table->dropColumn('share_token');
        });
    }
}   