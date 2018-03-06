<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
	use Notifiable;
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    
}
