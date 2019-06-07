<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Comment;
use app\Http\Requests\PostRequest;

class CommentController extends Controller
{
    public function store(PostRequest $request)
    {
        $comment = new Comment;
        $comment->load('posts');
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect("/posts/$comment->post_id");
    }
}
