<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    function products(){
    	return $this->hasMany('App\Product');
    }
}
