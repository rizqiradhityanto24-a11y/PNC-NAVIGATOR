<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloorToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('floor')->nullable()->after('building');
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('floor');
        });
    }
}