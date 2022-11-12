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
            </div>
            <br>
        @endforeach
    </div>
@endsection
