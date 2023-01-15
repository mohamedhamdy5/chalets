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
        Schema::create('chalets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('size')->comment('1=big, 2=small');
            $table->tinyInteger('type')->comment('1=family, 2=individual');
            $table->tinyInteger('pool')->comment('0=no pool, 1=has pool');
            $table->tinyInteger('external_session')->comment('0=no external session, 1=has external session');
            $table->string('location');
            $table->string('contact');
            $table->integer('price');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
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
        Schema::dropIfExists('chalets');
    }
};
