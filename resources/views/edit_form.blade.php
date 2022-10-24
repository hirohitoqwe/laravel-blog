@extends('layout')
@section('content')
<div>
    <a class="btn btn-light btn-sm" href="{{route('posts.index')}}" role="button" >Вернуться к постам</a>
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name" value="{{$post->author}}">
        <p><b>Заголовок статьи:</b></p>
        <input type="text" size="40" name="title" value="{{$post->title}}">
        <p><b>Текст статьи:</b></p>
        <textarea name="text" id="" cols="30" rows="10">{{$post->text}}</textarea>
        <p><button type="submit" class="btn btn-success">Обновить</button></p>
    </form>
</div> 
@endsection