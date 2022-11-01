@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ваши посты') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p><a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button">Сделать
                                пост</a></p>
                        @php
                            $posts=App\Models\Post::where('user_id',Auth::user()->id)->get();
                        @endphp
                        @foreach($posts as $post)
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->text}}</p>
                                    <a href="{{route('posts.show',$post->id)}}" class="card-link">Ссылка на пост</a>
                                </div>
                            </div>
                            <div class="container m-2" style="display: flex;justify-content: flex-start">
                                <a class="btn btn-info btn-sm" href="{{route('posts.edit',$post->id)}}" role="button">Обновить</a>
                                <form method="POST" action="{{route('posts.destroy',$post->id)}}" class="px-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
