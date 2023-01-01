@extends('layouts.app')
@section('content')
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
