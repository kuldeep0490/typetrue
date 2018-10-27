<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTabls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->integer('diagnosedMonthsAgo')->nullable();
            $table->string('smoker')->nullable();
            $table->integer('heightInInches')->nullable();
            $table->integer('weightInPounds')->nullable();
            $table->float('a1c', 8, 2)->nullable();
            $table->boolean('hasComplications')->nullable();
            $table->float('bmi', 8, 2)->nullable();
            $table->integer('rating')->nullable();
            $table->string('product')->nullable();
            $table->integer('faceAmount')->nullable();
            $table->float('monthlyPremium', 8, 2)->nullable();
            $table->boolean('declined')->nullable();
            $table->string('declineReason')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
