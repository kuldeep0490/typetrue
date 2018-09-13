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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('age');
            $table->string('gender');
            $table->integer('diagnosedMonthsAgo');
            $table->string('smoker');
            $table->integer('heightInInches');
            $table->integer('weightInPounds');
            $table->float('a1c', 8, 2);
            $table->boolean('hasComplications');
            $table->float('bmi', 8, 2);
            $table->integer('rating');
            $table->string('product')->nullable();
            $table->integer('faceAmount')->nullable();
            $table->float('monthlyPremium', 8, 2)->nullable();
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
