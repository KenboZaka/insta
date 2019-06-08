@extends('layouts.master')

@section('title', 'user_page')

@section('content')
<div class='container'>
        <div>
            <h3>{{$user->name}}さんの投稿一覧</h3>
        </div>
    <div class="row">
        <div class="col">
            <div class="row no-gutters">
                @foreach($posts as $post)
                <div class="col-3">
                    @if(isset($post->image))
                        <a href="/posts/{{$post->id}}"><img src="{!! Storage::disk('s3')->url($post->image) !!}" width="300" class="img-fluid"></a>
                        <p>{{$post->created_at->format('Y年m月d日')}}</p>
                    @else
                    <div class=" border mb-0">
                        <p class="mb-0">内容：<a class="m-0" href="/posts/{{$post->id}}">{!!nl2br($post->content)!!}</a></p>
                    </div>
                        <p class="">{{$post->created_at->format('Y年m月d日')}}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection