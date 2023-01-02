@extends('layouts.app')
@section('content')
    <p><a class="btn btn-secondary btn-sm" href="{{route('admin.users')}}" role="button">Пользователи</a></p>
    <p><a class="btn btn-secondary btn-sm" href="{{route('admin.stats')}}" role="button">Статистика сайта</a></p>
    <table class="table">
        <thead>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col">Created At</th>
        </thead>
        @foreach($posts as $post)
            <thead>
            <tr>
                <th scope="col">{{$post->id}}</th>
                <th scope="col">{{$post->title}}</th>
                <th scope="col">{{$post->text}}</th>
                <th scope="col">{{$post->created_at}}</th>
                <th>
                    <form method="POST" action="{{route('admin.destroy',$post->id)}}" class="px-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </th>
                <th><a class="btn btn-info btn-sm" href="{{route('admin.edit',$post->id)}}" role="button">Обновить</a>
                </th>
            </tr>
            </thead>
        @endforeach
    </table>

@endsection
