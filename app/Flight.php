<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
     protected $fillable = array('id', 'dep_airport', 'dest_airport','trip_id');
}
