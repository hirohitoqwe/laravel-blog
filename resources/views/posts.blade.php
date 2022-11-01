@extends('layout')
@section('content')
    <div class="container m-1" style="display: flex;justify-content: normal ">
        <a class="btn btn-secondary btn-sm m-lg-1" href="{{route('home')}}" role="button">Ваш профиль</a>
        <a class="btn btn-secondary btn-sm m-lg-1" href="{{route('posts.create')}}" role="button">Сделать пост</a>
    </div>

    <table class="table">
        <tbody>
        <tr>
            <td>№</td>
            <td>Title</td>
            <td>Text</td>
            <td>Author</td>
        </tr>
        </tbody>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><a href="{{route('posts.show',$post->id)}}">{{$post->id}}</a></td>
                <td>{{$post->title}}</td>
                <td>{{$post->text}}</td>
                <td>{{$post->author}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>
@endsection
