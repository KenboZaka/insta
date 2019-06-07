<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Post;
use app\Tag;

class TagController extends Controller
{
    public function show(Tag $tag){
        $posts = Post::where('tag_name', $tag->tag_name)->get();
        
        return view('tags.tag', ['posts'=>$posts, 'tag'=>$tag]);
    }
}
