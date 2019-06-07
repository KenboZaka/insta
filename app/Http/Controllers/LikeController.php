<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Post;
use app\Like;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){
        $like = new Like;
        $like->user_id = \Auth::user()->id;
        $like->post_id = $post->id;
        $like->save();
        return redirect("/posts/$post->id");
    }

    public function delete(Post $post){

        $my_like = Like::where('user_id', \Auth::id())->where('post_id', $post->id)->first();
        $my_like->delete();
        return redirect("/posts/$post->id");
    }
}
