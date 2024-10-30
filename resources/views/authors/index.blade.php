@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h1 class="text-success"><i class="bi bi-person-lines-fill"></i> Authors</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-success btn-lg shadow-sm"><i class="bi bi-plus-circle"></i> Create New Author</a>
    </div>
    
    @if($authors->isEmpty())
        <div class="alert alert-warning text-center p-4" role="alert">
            <strong>No authors found.</strong>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="table-success">
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td class="align-middle">{{ $author->name }}</td>
                            <td class="align-middle">{{ $author->email }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="bi bi-eye-fill"></i> Show
                                </a>
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
