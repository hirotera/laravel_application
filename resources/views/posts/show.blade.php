@extends('layouts.app')

@section('content')
<div class="col-md-6 mx-auto">
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
                    @if ($post->user_id === Auth::id())
                    <a class="btn btn-success btn-sm" href="{{ route('post.edit', ['id' => $post->id]) }}">
                        <i class="far fa-edit"></i>編集
                    </a>
                    <a class="btn btn-danger btn-sm" rel="nofollow" href="{{ route('post.delete', ['id' => $post->id]) }}">
                        <i class="far fa-trash-alt"></i>削除
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection