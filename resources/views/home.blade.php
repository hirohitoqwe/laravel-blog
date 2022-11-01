@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!---<div class="card-header">{{ __('Blog-Post') }}</div>-->

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p><a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button">Сделать
                                пост</a></p>
                        {{ __('Ваши посты') }}
                        @php
                            use App\Models\Post;
                            $posts=Post::where('user_id',Auth::user()->id)->get();
                        @endphp
                        @foreach($posts as $post)
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->text}}</p>
                                    <a href="{{route('posts.show',$post->id)}}" class="card-link">Ссылка на пост</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
