@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 450px; border-radius: 15px;">
        <h2 class="text-center mb-4">Login</h2>
        <p class="text-center text-muted mb-4">Welcome to the MSIB Blog</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Your Email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Enter Your Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="btn btn-link text-dark">Forgot Your Password?</a>
            </div>
            <div class="text-center mt-3">
                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="link-primary text-dark">Sign up</a></p>
            </div>
            
        </form>
    </div>
</div>

<style>
    body {
        background-image: url('path_to_your_background_image.jpg');
        background-size: cover;
        background-position: center;
        color: white; 
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
        background-color: #006600
        ;
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
