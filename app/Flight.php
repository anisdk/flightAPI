<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Airport;

class Flight extends Model
{
    protected $fillable = array('id', 'dep_airport', 'dest_airport', 'trip_id');
	 
    // DEFINE RELATIONSHIPS --------------------------------------------------

    public function dep_airport() {
        return $this->belongsTo('App\Airport', 'dep_airport'); // this matches the Eloquent model
    }

    public function dest_airport() {
        return $this->belongsTo('App\Airport', 'dest_airport'); // this matches the Eloquent model
    }	
	
    public function trip() {
        return $this->belongsTo('App\Trip', 'trip_id'); // this matches the Eloquent model
    }	
}
