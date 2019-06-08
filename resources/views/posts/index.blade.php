@extends('layouts.master')

@section('title', 'top_page')

@section('content')
<div class="jumbotron jumbotron-fluid mb-3 bg-primary">
    <div class="container">
        <h1>駅Diary    <span><i class="fas fax3 fa-train"></i></span></h1>
        <h6 class="text-white">駅での出来事を投稿するサイトです</h6>
    </div>
</div>  
    <div class='container'>
        <div class="row">
            <div class="col">
                    <div class="d-flex justify-content-end">
                            <form action="/posts/search" method="post" class="form-group">
                                @csrf
                                <div class="input-group">
                                <input type="text" name="search" class="form-control-sm" placeholder="内容を検索">
                                <button type="submit">
                                    <i class="fas fa-search input-group-append"></i>
                                </button>
                                </div>
                            </form>
                        </div>
                <div class="card">
                  
                        @foreach($posts as $post)
                        <div class="card">
                            <div class="container">
                            <div class="row">
                            
                            @if(isset($post->image))
                                <div class="col-lg-4">
                                        <img src="{!! Storage::disk('s3')->url($post->image) !!}" width="350" class="my-3 rounded border">
                                </div>
                                @else
                                <div class="col-lg-4 text-center py-5">
                                    <i class="fas fa-5x fa-subway">no image</i>
                                </div>
                                @endif
                            <div class="col-lg-8 p-3">
                                @if(Auth::check())
                                    <a class="detail btn btn-primary float-right mx-3" href="/user/{{$post->user_id}}">{{$post->users->name}}さんの投稿一覧</a>
                                    <p class="h5 p-1 mb-2">名前: {{$post->users->name}}</p>
                                @else
                                    <p class="h5 mb-2">名前: {{$post->users->name}}</p>
                                @endif
                                    <p class="h5 py-1">駅がある区：<a href="/stations/{{$post->station_id}}" class="badge bagde-pill badge-success">{{$post->stations->station_name}}</a></p>       
                                @foreach($post->tags as $tag)
                                    <p class="h5 py-1">タグ：<a href="/tags/{{$tag->id}}" class="badge bagde-pill badge-warning">{{$post->tag_name}}</a></p>
                                @endforeach
                                    <p class="h5 mb-0">内容：</p>
                                    <p class="h5 mb-0 px-3">{!!nl2br($post->content)!!}</p>
                                <a class="detail_post btn btn-primary float-left my-3" href="/posts/{{$post->id}}">詳細へ</a>
                            </div> 
                            </div>
                        </div>
                        </div>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection