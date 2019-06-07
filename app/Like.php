<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Post;
use app\User;

class Like extends Model
{
    public function posts(){
        return $this->belongsTo('app\Post', 'post_id');
    }
    public function users(){
        return $this->belongsTo('app\User', 'user_id');
    }
}
