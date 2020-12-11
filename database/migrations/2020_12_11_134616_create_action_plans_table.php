<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer("zone_green_peakflow_before_medicines");
            $table->integer("zone_green_peakflow_after_medicines");
            $table->string("zone_green_explanation")->nullable();
            $table->integer("zone_yellow_peakflow_below");
            $table->integer("zone_yellow_peakflow_above");
            $table->string("zone_yellow_medicines")->nullable();
            $table->string("zone_yellow_explanation")->nullable();
            $table->string("phonenumber_gp")->nullable();
            $table->string("phonenumber_lung_specialist")->nullable();
            $table->string("zone_orange_explanation")->nullable();
            $table->integer("zone_red_peakflow");
            $table->string("zone_red_medicines")->nullable();
            $table->string("zone_red_explanation")->nullable();
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
        Schema::dropIfExists('action_plans');
    }
}
