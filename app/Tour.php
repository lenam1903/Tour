<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = "tour";

    public function tag()
    {
    	return $this->belongsTo('App\Tag','ID_Tag','ID');
    }

    public function directory()
    {
    	return $this->belongsTo('App\Directory','ID_Directory','ID');
    }

     public function user()
    {
    	return $this->belongsTo('App\User','ID_Users','ID');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment','ID_Tour','ID');
    }

    public function ticketlist()
    {
    	return $this->hasMany('App\TicketList','ID_Tour','ID');
    }

    public function tourdetails()
    {
    	return $this->hasOne('App\TicketList', 'ID');   
    }

    public function places()
    {
    	return $this->hasManyThrough('App\Places','App\Directory','ID_Directory','ID_Directory','ID');
    }

    public function places1()
    {
        return $this->belongsTo('App\Places','ID_Place','ID');
    }
    
}
