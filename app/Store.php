<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $table = 'store';
    function products(){
    	return $this->hasMany('App\Product');
    }
}
