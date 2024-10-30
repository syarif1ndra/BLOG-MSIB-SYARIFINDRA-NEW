@extends('layouts.sidebar')

@section('title', 'Manage Posts - Blog MSIB')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-success">
            <i class="bi bi-file-earmark-post" style="font-size: 1.5rem;"></i> Manage Posts
        </h1>
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Create New Post
        </a>

        @if ($posts->isEmpty())
            <div class="alert alert-info" role="alert">
                No posts available. <a href="{{ route('posts.create') }}" class="alert-link">Create a new post</a>.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle shadow-sm">
                    <thead class="table-success text-center">
                        <tr>
                            <th><i class="bi bi-text-paragraph"></i> Title</th>
                            <th><i class="bi bi-bookmark"></i> Category</th>
                            <th><i class="bi bi-person"></i> Author</th>
                            <th><i class="bi bi-eye-fill"></i> Status</th>
                            <th><i class="bi bi-tools"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ Str::limit($post->title, 30) }}</td>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ $post->category->name }}</span>
                                </td>
                                <td>{{ optional($post->author)->name ?? 'Unknown Author' }}</td>
                                <td class="text-center">
                                    @if ($post->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection
