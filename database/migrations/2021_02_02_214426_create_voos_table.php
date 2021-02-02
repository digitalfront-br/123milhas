<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->string('cia');
            $table->string('fare');
            $table->string('flightNumber');
            $table->string('origin');
            $table->string('destination');
            $table->string('departureDate');
            $table->string('arrivalDate');
            $table->string('departureTime');
            $table->string('arrivalTime');
            $table->integer('classService');
            $table->decimal('price');
            $table->integer('tax');
            $table->integer('outbound');
            $table->integer('inbound');
            $table->string('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voos');
    }
}
