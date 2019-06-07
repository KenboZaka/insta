<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\User;
use app\Post;

class UserController extends Controller
{
    public function show(User $user){
            $posts = Post::where('user_id', $user->id)->get();
            return view('users.user', ['user'=>$user, 'posts'=>$posts]);
    }

   
}
