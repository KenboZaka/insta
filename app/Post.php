<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Comment;
use app\User;
use app\Tag;
use app\Station;

class Post extends Model
{
    protected $fillable = [
        'content', 'image'
    ];

    public function comments(){
        return $this->hasMany('app\Comment', 'post_id');
    }
    public function users(){
        return $this->belongsTo('app\User', 'user_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany('app\Tag');
    }
    public function stations(){
        return $this->belongsTo('app\Station', 'station_id');
    }
}
