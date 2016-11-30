<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Flight;
use App\Http\Controllers\Controller;
use App\Airport;

class Flights extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Flight::with('dep_airport')->with('dest_airport')->with('trip')->get();
        } else {
            return Flight::with('dep_airport')->with('dest_airport')->with('trip')->where('id','=', $id)->first();
			
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $flight = new Flight;

        $flight->dep_airport = $request->input('dep_airport.id');
        $flight->dest_airport = $request->input('dest_airport.id');
        $flight->trip_id = $request->input('trip_id.id');
        $flight->save();

        return 'flight record successfully created with id ' . $flight->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Flight::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $flight = Flight::find($id);

        $flight->dep_airport = $request->input('dep_airport.id');
        $flight->dest_airport = $request->input('dest_airport.id');
        $flight->save();

        return "Sucess updating user #" . $flight->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $flight = Flight::find($id);

        $flight->delete();

        return "Flight record successfully deleted #" . $id;
    }
}
