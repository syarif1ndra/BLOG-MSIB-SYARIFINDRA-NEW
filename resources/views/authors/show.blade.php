@extends('layouts.sidebar')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-success"><i class="bi bi-person-circle"></i> Detail Penulis</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Author: {{ $author->name }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Email:</strong> <span class="text-muted">{{ $author->email }}</span>
            </div>
            <div class="mb-3">
                <strong>Bio:</strong>
                <p class="text-muted">{{ $author->bio ?? 'No biography available.' }}</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
