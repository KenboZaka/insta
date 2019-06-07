@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class='container'>
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-body">
                        <div class="row">
                            
                                <div class="col-lg-4">
                                        @if(isset($post->image))
                                        <img src="{{asset('storage/images/'.$post->image)}}" width="400px" class="img-fluid float-left rounded">
                                    @else
                                    <div class="col-lg-4 text-center py-5">
                                        <i class="fas fa-5x fa-subway">no image</i>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-text">
                                        <p class="float-right">{{$post->created_at->format('Y年m月d日')}}</p>
                                        <p>{{$post->users->name}}さんの投稿</p>
                                        <p >投稿内容：{!!nl2br($post->content)!!}</p>
                                    </div>
                                        @foreach($post->tags as $tag)
                                                <p>タグ：<a href="/tags/{{$tag->id}}">{{$post->tag_name}}</a></p>
                                                @endforeach
                                        @if(Auth::id()==$post->user_id)
                                            
                                            <form action="/post/delete/{{$post->id}}" method="post">
                                            @csrf
                                            <input type="submit" class="delete btn btn-danger ml-3 float-right" value="削除する">
                                            <a href="/post/edit/{{$post->id}}" class="edit btn btn-primary float-right">編集する</a>
                                            </form>
                                        @endif
                                        <div>
                                        @if($is_like)
                                            <form action="/like/delete/{{$post->id}}" method="post">
                                                @csrf
                                                <button type="submit" name="user_id post_id" class="btn btn-primary float-left">
                                                        取り消し  <i class="far fa-thumbs-up"></i>{{$like_count}}
                                                </button>
                                            </form>
                                        @else
                                            <form action="/like/store/{{$post->id}}" method="post">
                                                @csrf
                                                <button type="submit" name="user_id post_id" class="btn btn-primary float-left">
                                                        いいね  <i class="far fa-thumbs-up"></i>{{$like_count}}
                                                </button>
                                            </form>
                                        @endif                                    
                                    </div>  
                                </div>
                            </div>
                        </div>                 
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/comment/store" class="form-group">
                            @csrf
                            <label for="content">コメント</label>
                            <textarea name="content" id="editor" class="form-control" cols="10" rows="10"></textarea>
                            <input type="submit" class="btn btn-primary my-3" value="投稿する">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        </form>
                    </div>
                </div>
                @foreach($post->comments as $comment)
                <div class="card">
                    <div class="card-body">
                        <p class="float-right">{{$post->created_at->format('Y年m月d日')}}</p>
                        <p>名前：{!!nl2br($comment->users->name)!!}</p>
                        <p>内容：{!!nl2br($comment->content)!!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
 CKEDITOR.replace('editor',{
   codeSnippet_theme:'dark',
   height:'370px',
   removeButtons:'Table,Subscript,Superscript,Source,Image,Link,Unlink,Anchor,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,RemoveFormat,Outdent,Indent,Blockquote,Styles,About'

   });

</script>
@endsection