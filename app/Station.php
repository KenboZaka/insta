<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Post;

class Station extends Model
{
    protected $fillable =[
        'station_name'
    ];

    public function posts(){
        return $this->hasMany('app\Post', 'id');
    }
}
