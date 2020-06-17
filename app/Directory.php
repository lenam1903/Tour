<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = "directory";

    public function Tour()
    {
    	return $this->hasMany('App\Tour','ID_Directory','ID');
    }

    public function places()
    {
    	return $this->hasMany('App\Places','ID_Directory','ID');
    }

}
