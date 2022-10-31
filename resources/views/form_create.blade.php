@extends('layout')
@section('content')
<div>
    <a class="btn btn-light" href="{{route('posts.index')}}" role="button" >Посты</a>
    <a class="btn btn-light" href="{{route('home')}}" role="button" >Профиль</a>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name" value="{{Auth::user()->name}}">
        <p><b>Заголовок поста:</b></p>
        <input type="text" size="40" name="title">
        <p><b>Текст поста:</b></p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <p><button type="submit" class="btn btn-success">Сохранить</button></p>
    </form>
</div>
@endsection
