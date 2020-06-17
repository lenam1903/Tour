<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table = "places";

    public function directory()
    {
        return $this->belongsTo('App\Directory','ID_Directory','ID');
    }
}
