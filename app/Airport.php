<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = array('id', 'name', 'city', 'country', 'iata_faa', 'icao', 'latitude', 'longitude', 'altitude', 'tz_time', 'timezone', 'dst');
	
    public function flights() {
        return $this->hasMany('App\Flight', 'dep_airport', 'id'); // this matches the Eloquent model
    }


}
