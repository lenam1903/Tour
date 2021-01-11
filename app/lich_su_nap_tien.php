<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lich_su_nap_tien extends Model
{
    use HasFactory;
    protected $table = "lich_su_nap_tien";

    public function users()
    {
    	return $this->belongsTo('App\User','id_users','ID');
    }
}
