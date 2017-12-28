<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user(){
        return $this->belongsTo('App\Users');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
