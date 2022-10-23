@extends('layout')
@section('content')
<a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button" >Сделать пост</a>
<table>
@foreach ($posts as $post)
        <tr>
            <td>{{$post->author}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->text}}</td>
        </tr>
    
@endforeach
</table>
@endsection