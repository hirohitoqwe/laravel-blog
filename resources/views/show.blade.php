@extends('layout')
@section('content')
    <div>
        <a class="btn btn-light btn-sm" href="{{route('posts.index')}}" role="button">Вернуться к постам</a>
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name" value="{{$post->author}}" readonly="readonly">
        <p><b>Заголовок поста:</b></p>
        <input type="text" size="40" name="title" value="{{$post->title}}" readonly="readonly">
        <p><b>Текст поста:</b></p>
        <textarea name="text" id="" cols="30" rows="10" readonly="readonly">{{$post->text}} </textarea>
    </div>
    @php
        $flag=false;
        $count=\App\Models\UserLike::where('post_id','=',$post->id)->get()->count();
        if (auth()->user()){
            $flag=\App\Models\UserLike::where('post_id','=',$post->id)->where('user_id','=',auth()->user()->id)->get()->count();
        }
    @endphp
    <div class="pb-0">
        <form method="POST" action="{{route('post.like',$post->id)}}">
            @csrf
            @if ($flag)
                <button type="submit" class="border-0 bg-transparent">
                    <i class="bi bi-heart-fill">{{$count}}</i>
                </button>
            @else
                <button type="submit" class="border-0 bg-transparent">
                    <i class="bi bi-heart">{{$count}}</i>
                </button>
            @endif
        </form>

    </div>
    <div style="padding-top:60px;">
        <form action="{{route('comment.store',$post->id)}}" method="POST"><!---comment--->
            @csrf
            <p><b>Комментарий:</b></p>
            <p><textarea name="title" id="" cols="40" rows="7"></textarea></p>
            <p>
                <button type="submit" class="btn btn-success">Отправить</button>
            </p>
        </form>
        @if (session('emptyCommentField'))
            @php
                Session::forget('emptyCommentField');
            @endphp
            <div class="alert alert-danger" role="alert">
                Вы хотите отправить пустой комментарий!
            </div>
        @endif
    </div>

    <div>
        @foreach($comments as $comment)
            <div> {{$comment->name}}</div>
            <div
                style="background: #E0E0E0;margin-bottom:10px;margin-top:1px ;width: 1080px;display: inline-block;vertical-align: top;">
                {{$comment->text}}
                @if (auth()->user()->is_admin)
                    <div>
                        <form method="POST" action="{{route('admin.comment.delete',$comment->id)}}" class="px-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить </button>
                        </form>
                    </div>
                @endif
            </div>
            <br>
        @endforeach
    </div>
@endsection
