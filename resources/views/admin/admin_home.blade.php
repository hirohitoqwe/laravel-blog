@extends('layouts.app')
@section('content')
    <table class="table">
        @foreach($posts as $post)
            <thead>
            <tr>
                <th scope="col">{{$post->id}}</th>
                <th scope="col">{{$post->title}}</th>
                <th scope="col">{{$post->text}}</th>
                <th scope="col">Handle</th>
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
