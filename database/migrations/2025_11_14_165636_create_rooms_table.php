<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('building');
            $table->string('floor');
            $table->text('description')->nullable();
            $table->integer('capacity')->default(0);
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('image')->nullable();
            $table->string('type')->default('classroom');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruangans');
    }
};