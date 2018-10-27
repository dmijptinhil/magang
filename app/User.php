<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function disposisis(){
        return $this->hasMany('App\Disposisi');
    }
     public function inletters(){
        return $this->hasMany('App\Inletter');
    }
     public function outletters(){
        return $this->hasMany('App\Outletter');
    }

}
