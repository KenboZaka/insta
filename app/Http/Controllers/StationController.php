<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Post;
use app\Station;

class StationController extends Controller
{
   
        public function show(Station $station){
            $posts = Post::where('station_id', $station->id)->get();
            return view('stations.station', ['posts'=>$posts, 'station'=>$station]);
        }
    
}
