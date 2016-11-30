<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('city')->unique();
            $table->string('country');
            $table->string('iata_faa');
            $table->string('icao');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->decimal('altitude');			
            $table->decimal('timezone');			
            $table->string('dst');			
            $table->string('tz_time');					
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('airports');
    }
}
