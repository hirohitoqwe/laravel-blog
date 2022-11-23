@extends('layouts.app')
@section('content')
    <p><a class="btn btn-secondary btn-sm" href="{{route('admin')}}" role="button">Администрирование постов</a></p>
    <table class="table">
        <thead>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Mail</th>
        <th scope="col">Created At</th>
        </thead>
        @foreach($users as $user)
            <thead>
            <tr>
                <th scope="col">{{$user->id}}</th>
                <th scope="col">{{$user->name}}</th>
                <th scope="col">{{$user->email}}</th>
                <th scope="col">{{$user->created_at}}</th>
                <th>
                    <form method="POST" action="{{route('admin.user.delete',$user->id)}}" class="px-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить </button>
                    </form>
                </th>
            </tr>
            </thead>
        @endforeach
    </table>

@endsection
