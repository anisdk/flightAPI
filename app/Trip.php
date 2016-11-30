<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Trip;

class Trip extends Model
{
    protected $fillable = array('id', 'name');
	 
    // DEFINE RELATIONSHIPS --------------------------------------------------
	
    public function flights() {
        return $this->hasMany('App\Flight');
    }
}
