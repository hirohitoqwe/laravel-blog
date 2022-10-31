@extends('layout')
@section('content')
    <div class="mb-2" >
        <a class="btn btn-secondary btn-sm" href="{{route('home')}}" role="button">Ваш профиль</a>

    </div>
<a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button" >Сделать пост</a>
<table class="table">
    <tbody>
        <tr>
            <td>ID</td>
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
<div>
    {{ $posts->links() }}
</div>
@endsection
