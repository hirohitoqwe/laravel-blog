@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blog-Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p><a class="btn btn-secondary btn-sm" href="{{route('posts.create')}}" role="button">Сделать
                                пост</a></p>
                        {{ __('Ваши посты') }}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
