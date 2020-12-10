<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeakflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peakflows', function (Blueprint $table) {
            $table->increments("id");
            // TODO: add user_id
            $table->date("date");
            $table->time("time");
            $table->integer("measurement_one");
            $table->integer("measurement_two");
            $table->integer("measurement_three");
            $table->boolean("taken_medicines");
            $table->string("explanation");
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
        Schema::dropIfExists('peakflows');
    }
}
