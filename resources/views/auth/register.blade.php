@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 500px; border-radius: 15px;">
        <h2 class="text-center mb-4">Register</h2>
        <p class="text-center text-muted mb-4">Create a new account to join with us</p>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>There were some issues with your submission:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Create a password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Register</button>
            </div>
        </form>
    </div>
</div>

<style>
    body {
        background-image: url('path_to_your_background_image.jpg'); 
        background-size: cover;
        background-position: center;
        color: rgb(255, 255, 255); 
        font-family: 'Arial', sans-serif;
    }
    .card {
        background: rgba(255, 255, 255, 0.95); 
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px); 
    }
    .btn-primary {
        background-color: #006600;
        border-color: #006600;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #006600;
        border-color: #006600;
    }
    .input-group-text {
        background-color: #006600;
        color: white;
        border-radius: 10px 0 0 10px; 
    }
    .form-check-label {
        color: #6c757d;
    }
    .link-primary {
        color: #006600;
    }
    .link-primary:hover {
        color: #006600;
        text-decoration: underline; 
    }
</style>
@endsection
