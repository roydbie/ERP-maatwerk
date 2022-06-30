<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('werkorders', function (Blueprint $table) {
            $table->id();
            $table->string('omschrijving');
            $table->string('klant');
            $table->date('plandatum');
            $table->time('plantijd');
            $table->date('opleverdatum')->nullable();
            $table->time('oplevertijd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('werkorders');
    }
};
