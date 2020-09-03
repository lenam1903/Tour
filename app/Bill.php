<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";

 

    public function users()
    {
    	return $this->belongsTo('App\User','ID_Users','ID');
    }

    public function tour()
    {
    	return $this->belongsTo('App\Tour','ID_Tour','ID');
    }

    public function billDetails()
    {
    	return $this->hasMany('App\BillDetails','ID_Bill','ID');
    }
}
