<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
