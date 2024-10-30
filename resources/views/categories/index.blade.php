@extends('layouts.sidebar')

@section('title', 'Categories')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-success"><i class="bi bi-tags"></i> Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Create Category
    </a>

    <div class="list-group">
        @if ($categories->count() > 0)
            @foreach ($categories as $category)
                <div class="list-group-item d-flex justify-content-between align-items-center bg-light border-0 rounded-3 mb-2 shadow-sm">
                    <a href="{{ route('categories.show', $category->id) }}" class="me-3 fw-bold text-success">{{ $category->name }}</a>
                    <div>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info me-1" title="Show">
                            <i class="bi bi-eye"></i> Show
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item text-center bg-light border-0 rounded-3 shadow-sm">
                No data available.
            </div>
        @endif
    </div>
</div>
@endsection
