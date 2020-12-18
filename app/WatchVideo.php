<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchVideo extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function seriesCat()
    {
        //Belongs To = video ke series - A ke B
        return $this->belongsTo('App\series','series','id');
    }
}
