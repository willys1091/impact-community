<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    public function video()
    {
        //Belongs To = video ke series - B ke A
        return $this->hasMany('App\WatchVideo', 'series', 'id');
    }
}
