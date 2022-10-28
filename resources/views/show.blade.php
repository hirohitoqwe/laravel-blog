@extends('layout')
@section('content')
    <div>
        <a class="btn btn-light btn-sm" href="{{route('posts.index')}}" role="button" >Вернуться к постам</a>
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name" value="{{$post->author}}">
        <p><b>Заголовок статьи:</b></p>
        <input type="text" size="40" name="title" value="{{$post->title}}">
        <p><b>Текст статьи:</b></p>
        <textarea name="text" id="" cols="30" rows="10">{{$post->text}}</textarea>
    </div>
    <div style="padding-top:60px">
        <form action="{{}}" method="POST"><!---comment--->
            @csrf
            <p><b>Имя:</b></p>
            <input type="text" size="40" name="name">
            <p><b>Комментарий:</b></p>
            <input type="text" size="40" name="title">
            <p><button type="submit" class="btn btn-success">Отправить</button></p>
        </form>
    </div>
@endsection
