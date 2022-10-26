@extends('layout')
@section('content')
<div>
    <a class="btn btn-light" href="{{route('posts.index')}}" role="button" >Вернуться к постам</a>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name">
        <p><b>Заголовок статьи:</b></p>
        <input type="text" size="40" name="title">
        <p><b>Текст статьи:</b></p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <p><button type="submit" class="btn btn-success">Отправить</button></p>
    </form>
</div> 
@endsection