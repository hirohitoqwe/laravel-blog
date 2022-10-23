@extends('layouts.layout')
@yield('header')
<div>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p><b>Имя автора:</b></p>
        <input type="text" size="40" name="name">
        <p><b>Заголвоок статьи:</b></p>
        <input type="text" size="40" name="title">
        <p><b>Текст статьи:</b></p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <p><input type="submit"></p>
    </form>
</div> 