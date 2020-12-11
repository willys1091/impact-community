<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'content';

    public function FileManager(){
        return $this->belongsTo('App\FileManager','user_id');
    }
}
