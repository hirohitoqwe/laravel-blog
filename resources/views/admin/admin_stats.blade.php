@extends('layouts.app')
@section('content')
    <h4>Количество комментариев - {{$commentCount}}</h4>
    <h4>Количество постов - {{$postCount}}</h4>
    <h4>Количество пользователей - {{$userCount}}</h4>

    <h4>Самый популярный пост</h4>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$popPost->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$popPost->author}}</h6>
            <p class="card-text">{{$popPost->text}}</p>
            <a href="{{route('posts.show',$popPost->id)}}" class="card-link">Ссылка</a>
        </div>
    </div>
@endsection
