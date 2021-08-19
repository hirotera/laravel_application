@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <a class="btn btn-primary btn-md" href="{{ route('post.create') }}">
            <i class="far fa-create"></i>＋新規投稿する
        </a>
        @foreach ($posts as $post)
            <div class="card-wrap">
                <div class="card mt-3">
                    <div class="card-header">
                        {{ $post->user->name }}
                    </div>
                    <div class="card-body">
                        <h3>
                            {{ $post->title }}
                        </h3>
                        <p class="mb-4">
                            {{ $post->body }}
                        </p>
                        <div class="text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('post.show', ['id' => $post->id]) }}">
                                <i class="far fa-show"></i>詳細
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection