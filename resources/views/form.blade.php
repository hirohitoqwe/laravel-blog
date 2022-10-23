@extends('layout')
@section('content')
<div>
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