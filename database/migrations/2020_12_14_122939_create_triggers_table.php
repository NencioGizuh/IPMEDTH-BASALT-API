<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triggers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean("tabacco_smoke")->default(false);
            $table->boolean("dust_mites")->default(false);
            $table->boolean("air_pollution")->default(false);
            $table->boolean("pets")->default(false);
            $table->boolean("fungi")->default(false);
            $table->boolean("fire_smoke")->default(false);
            $table->boolean("infections")->default(false);
            $table->boolean("effort")->default(false);
            $table->boolean("weather_conditions")->default(false);
            $table->boolean("hyperventilation")->default(false);
            $table->boolean("pollen")->default(false);
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
        Schema::dropIfExists('triggers');
    }
}
