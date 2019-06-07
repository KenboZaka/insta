@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class='container'>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/post/update/{{$post->id}}" method="post" class="form-group">
                        @csrf
                        <textarea name="content" id="editor" cols="10" rows="10" class="form-control">{{$post->content}}</textarea>
                        <input type="submit" class="edit btn btn-primary" value="編集完了">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
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
   removeButtons:'Table,Subscript,Superscript,Source,Image,Link,Unlink,Anchor,NewPage,DocProps,Preview,Templates,Cut,Copy,Paste,PasteText,Undo,Redo,Find,Replace,SelectAll,Scayt,RemoveFormat,Outdent,Indent,Blockquote,Styles,About'

   });

</script>
@endsection