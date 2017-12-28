<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Users extends Model implements Authenticatable
{
    //
    use \Illuminate\Auth\Authenticatable;

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function Votes(){
        return $this->hasMany('App\Vote');
    }
}
