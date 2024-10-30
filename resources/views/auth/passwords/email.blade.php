@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <div class="card-header text-center" style="background-color: #006400; color: white;">
                <h4 class="mb-0">{{ __('Reset Password') }}</h4>
            </div>
            

            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                        </div>
                        
                        @error('email')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px); 
    }
    .input-group-text {
        background-color: #006600;
        color: white;
    }
    .btn-primary {
        background-color: #006600;
        border-color: #006600;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-primary:hover {
        background-color: #006600;
        border-color: #006600;
        transform: scale(1.05);
    }
</style>
@endsection
