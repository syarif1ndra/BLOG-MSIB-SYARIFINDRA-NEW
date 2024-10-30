@extends('layouts.sidebar')

@section('title', 'Create Category - Blog MSIB')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-success"><i class="bi bi-plus-circle"></i> Create New Category</h1>

    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Back
    </a>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-tags"></i> Category Details</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold"><i class="bi bi-card-text"></i> Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" placeholder="Enter category name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold"><i class="bi bi-file-earmark-text"></i> Description</label>
                    <input type="text" name="description" id="description" class="form-control form-control-lg @error('description') is-invalid @enderror" 
                           value="{{ old('description') }}" placeholder="Enter category description" required>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg rounded-pill">
                        <i class="bi bi-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
