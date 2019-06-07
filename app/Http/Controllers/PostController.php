<?php

namespace app\Http\Controllers;

use app\Post;
use app\Like;
use app\Comment;
use app\User;
use app\Tag;
use app\Station;
use Illuminate\Support\Facades\Auth;
use app\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $posts->load('users','tags','stations');
   
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        return view('posts.create', ['stations'=>$stations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Tag $tag_name)
    {
        $post = new Post;
        
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->station_id = $request->station_id;
        
        if($request->has('image'))
        {
        $image = base64_encode(file_get_contents($request->image->getRealPath()));
        Post::insert(["image" => $image]);
        // $filename = $request->file('image')->store('public/images');
        // $post->image = basename($filename);
        }

        $image = base64_encode(file_get_contents($request->image->getRealPath()));
        Post::insert(["image" => $image]);

        $post->tag_name = $request->tag_name;
        $tag_name = $post->tag_name;
        $tags=[];
        $tag_create = Tag::firstOrCreate(['tag_name'=>$tag_name]);
        array_push($tags, $tag_create);

        $tag_ids = [];
        array_push($tag_ids, $tag_create['id']);

        // dd($post);
        $post->save();
        $post->tags()->attach($tag_ids);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $my_like = Like::where('user_id', \Auth::id())->where('post_id', $post->id)->first();
        $is_like = isset($my_like);
        $like_count = Like::where('post_id', $post->id)->count();
        $post->load('comments', 'users');
        return view('posts.show', ['post'=>$post, 'is_like'=>$is_like, 'like_count'=>$like_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect("/posts/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function search(Request $request){
        $posts = Post::Where('content', 'like', "%{$request->search}%")->get();
        return view('posts.index', ['posts'=>$posts]);
    }
}
