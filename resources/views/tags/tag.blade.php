@extends('layouts.master')

@section('title', 'tag')

@section('content')
<div class='container'>
        <div class="my-3">
            <h3>{{$tag->tag_name}}タグの一覧</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="row no-gutters">
                    @foreach($posts as $post)
                    <div class="col-lg-3">
                        @if(isset($post->image))
                        
                            <a href="/posts/{{$post->id}}"><img src="{!! Storage::disk('s3')->url($post->image) !!}" width="300" class="img-fluid"></a>
                            <p>{{$post->created_at->format('Y年m月d日')}}</p>
                        @else
                            <div class="text-center py-3 mb-0 float-lg-left">
                                <a class="m-0" href="/posts/{{$post->id}}"><i class="fas fa-5x fa-subway">no image</i></a>
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

