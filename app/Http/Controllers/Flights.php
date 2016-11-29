<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Flight;
use App\Http\Controllers\Controller;

class Flights extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Flight::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
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

        $flight->dep_airport = $request->input('dep_airport');
        $flight->dest_airport = $request->input('dest_airport');
        $flight->trip_id = $request->input('trip_id');
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

        $flight->dep_airport = $request->input('dep_airport');
        $flight->dest_airport = $request->input('dest_airport');
        $flight->trip_id = $request->input('trip_id');
        $flight->save();

        return "Sucess updating user #" . $flight->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $flight = Flight::find($request->input('id'));

        $flight->delete();

        return "Flight record successfully deleted #" . $request->input('id');
    }
}
