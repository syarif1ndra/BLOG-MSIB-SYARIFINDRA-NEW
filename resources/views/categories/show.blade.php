@extends('layouts.sidebar')

@section('content')
<div class="container mt-5">
    <h1 class="mt-4 mb-4 text-success"><i class="bi bi-tag"></i> Detail Kategori</h1>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">{{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong></p>
            <p class="text-muted">{{ $category->description }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('categories.index') }}" class="btn btn-success">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Kategori
            </a>
        </div>
    </div>
</div>
@endsection
