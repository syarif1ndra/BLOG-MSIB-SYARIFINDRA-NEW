@extends('layouts.sidebar')

@section('title', 'Profile Detail')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-success"><i class="bi bi-person-circle"></i> Profile Detail</h1>

    <div class="card shadow-lg border-0" style="border-radius: 15px;">
        <div class="card-header bg-success text-white text-center" style="border-radius: 15px 15px 0 0;">
            <img src="{{ asset('images/default-profile.png') }}" alt="Profile Picture" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
            <h4 class="mb-0">{{ $user->name }}</h4>
            <small class="text-light">User since {{ $user->created_at->format('d M Y') }}</small>
        </div>
        <div class="card-body p-4">
            <p><strong>Email:</strong> <span class="text-muted">{{ $user->email }}</span></p>
            <p><strong>Nama:</strong> <span class="text-muted">{{ $user->name }}</span></p>
            <p><strong>Terdaftar Sejak:</strong> <span class="text-muted">{{ $user->created_at->format('d M Y') }}</span></p>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #e8f5e9;
    }
    h1 {
        color: #2e7d32;
    }
    .card {
        background-color: #f1f8e9;
    }
</style>
