@extends('layouts.master')

@section('title', 'detail')

@section('content')

    <div class='container'>
        <div class="row">
            <div class="col">
                <div class="card">
                        @if($errors->has('content'))
                        <div class="card-header">
                            <span class="text-danger">{{$errors->first()}}</span>
                        </div>
                        @endif
                        @if($errors->has('image'))
                        <div class="card-header">
                            <span class="text-danger">{{$errors->first()}}</span>
                        </div>
                        @endif
                    <div class="card-body pb-1 pt-3">
                        <form action="/post/store" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <label for="content">投稿</label>
                        <textarea name="content" id="editor" cols="10" rows="10" class="form-control mb-5"></textarea>
                        <label for="image" class="mt-3">投稿イメージ (.pngまたはjpeg形式)</label>
                        <input type="file" name="image" class="form-control-file">
                        <label for="station_id" class=" mt-3">駅があるところ</label>
                        <select name="station_id" class="form-control">
                            @foreach($stations as $station)
                            <option value="{{$station->id}}">{{$station->station_name}}</option>
                            @endforeach
                        </select>
                        <label for="tag_name" class="mt-3">タグ</label>
                        <input type="text" name="tag_name" class="form-control" placeholder="好きなワードを登録してください">
                        <input type="submit" class="btn btn-primary my-3" value="新規投稿">
                        <input type="hidden" name="user_id"  value="{{Auth::id()}}">
                        </form>
                    </div>
                   
                        
                    
                </div>
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