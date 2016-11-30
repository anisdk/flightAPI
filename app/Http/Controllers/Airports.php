<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Airport;

class Airports extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Airport::orderBy('name', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

}
