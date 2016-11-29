<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('dep_airport')->unsigned();
			$table->integer('dest_airport')->unsigned();
			$table->integer('trip_id')->unsigned();
			
			$table->foreign('dep_airport')->references('id')->on('airports'); 
			$table->foreign('dest_airport')->references('id')->on('airports'); 
			$table->foreign('trip_id')->references('id')->on('trips'); 
        });
		

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flighs');
    }
}
