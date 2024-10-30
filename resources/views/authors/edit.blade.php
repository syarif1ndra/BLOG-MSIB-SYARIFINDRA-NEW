@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="card shadow-lg mt-5 mb-5 border-0">
        <div class="card-header bg-success text-white text-center">
            <h2 class="mb-0"><i class="bi bi-person-fill"></i> Edit Author</h2>
        </div>
        <div class="card-body p-5">
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

            <form action="{{ route('authors.update', $author->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="form-group mb-4">
                    <label for="name" class="form-label fw-bold"><i class="bi bi-person-fill"></i> Name</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-pill @error('name') is-invalid @enderror" id="name" value="{{ $author->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="form-label fw-bold"><i class="bi bi-envelope-fill"></i> Email</label>
                    <input type="email" name="email" class="form-control form-control-lg rounded-pill @error('email') is-invalid @enderror" id="email" value="{{ $author->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="bio" class="form-label fw-bold"><i class="bi bi-card-text"></i> Bio</label>
                    <textarea name="bio" class="form-control form-control-lg rounded-3 @error('bio') is-invalid @enderror" id="bio" rows="4" required>{{ $author->bio }}</textarea>
                    @error('bio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4"><i class="bi bi-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-success btn-lg rounded-pill px-5"><i class="bi bi-check-circle-fill"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
