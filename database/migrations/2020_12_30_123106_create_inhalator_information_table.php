<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInhalatorInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inhalator_information', function (Blueprint $table) {
            $table->id();
            $table->string('inhalatorName');
            $table->string('fabrikant');
            $table->string('afbeelding');
            $table->string('gebruikMedicijn');
            $table->string('type');
            $table->string('color');
            $table->boolean('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inhalator_information');
    }
}
