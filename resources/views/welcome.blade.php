@extends('layout')
@section('content')
<a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button" >Сделать пост</a>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Author</td>
            <td>Title</td>
            <td>Text</td>
        </tr>
    </thead>
    <tbody>
@foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->text}}</td>
            <td><a class="btn btn-info btn-sm" href="{{route('posts.edit',$post->id)}}" role="button" >Обновить</a></td>
            <td><form method="POST" action="{{route('posts.destroy',$post->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
            </form>
        </td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection