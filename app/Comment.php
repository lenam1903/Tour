<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    public function tour()
    {
    	return $this->belongsTo('App\Tour','ID_Tour','ID');
    }

    public function users()
    {
    	return $this->belongsTo('App\User','ID_Users','ID');
    }
}
