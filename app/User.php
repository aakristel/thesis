<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
     public function employments()
    {
        return $this->hasMany('App\Employment');
     }

     public function alumposts()
    {
        return $this->hasMany('App\Alumpost');
     }
      public function hobbies()
    {
        return $this->hasMany('App\Hobby');
     }
 
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'middlename', 'lastname', 'birthday', 'gender', 'address', 'course', 'nationality', 'religion', 'civil' ,'employment' ,'contact' ,'image' ,'username' , 'campus', 'yeargrad','verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
/**

