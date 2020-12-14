<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreathingExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breathing_exercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date("date");
            $table->integer("cp_measurement_one")->nullable();
            $table->integer("cp_measurement_two")->nullable();
            $table->boolean("interval")->default(false);
            $table->boolean("buteyko")->default(false);
            $table->boolean("papworth")->default(false);
            $table->boolean("middenrifspier")->default(false);
            $table->boolean("wim_hof")->default(false);
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
        Schema::dropIfExists('breathing_exercises');
    }
}
