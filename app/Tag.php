<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Post;

class Tag extends Model
{
    protected $fillable =[
        'tag_name'
    ];

    public function posts(){
        return $this->belongsToMany('app\Post');
    }
}
