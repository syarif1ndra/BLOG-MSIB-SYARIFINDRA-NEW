@extends('layouts.sidebar')

@section('title', $post->title . ' - Blog MSIB')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 mb-4" style="border-radius: 15px;">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover; width: 100%;">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title text-success fw-bold">{{ $post->title }}</h1>
                        <p class="text-muted">
                            <small>
                                Posted on {{ $post->created_at->format('F d, Y H:i') }} in <strong>{{ $post->category->name }}</strong> by <strong>{{ $post->author->name }}</strong>
                            </small>
                        </p>
                        <hr>
                        <p class="card-text fs-5">
                            {!! nl2br(e($post->content)) !!}
                        </p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-success">&larr; Back to Home</a>
                            @auth
                                @if (Auth::id() === $post->author_id)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit Post</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
