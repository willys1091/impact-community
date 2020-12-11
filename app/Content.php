<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'content';
}
