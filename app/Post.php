<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\Users');
    }

    public function Votes(){
        return $this->hasMany('App\Vote');
    }
}
