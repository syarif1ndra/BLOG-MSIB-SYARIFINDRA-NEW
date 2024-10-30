@extends('layouts.app')

@section('title', 'Home - Blog MSIB')

@section('content')

    <style>
        .card {
            height: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background-color: #f9f9f9; /* Ganti latar belakang kartu */
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #e7f9e7; /* Ganti latar belakang body kartu menjadi hijau muda */
        }

        .card-title a {
            color: #28a745; /* Ganti warna judul menjadi hijau */
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .card-title a:hover {
            color: #218838; /* Ganti warna hover menjadi lebih gelap */
        }

        .btn-primary {
            background-color: #28a745; /* Ganti warna tombol menjadi hijau */
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background-color: #218838; /* Ganti warna hover tombol menjadi lebih gelap */
        }

        /* Membuat semua kartu memiliki tinggi yang sama */
        .card-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 50px; /* Jarak antara card dan footer */
        }

        /* Responsif */
        @media (max-width: 992px) {
            .card-wrapper {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .card-wrapper {
                grid-template-columns: 1fr;
            }

            .card-img-top {
                height: 200px;
            }
        }
    </style>

    <div class="container">
        <div class="card-wrapper">
            @foreach ($posts as $post)
                <div class="card">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="default image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        </h5>
                        <p class="card-text">
                            {!! Str::limit($post->content, 100, '...') !!}
                        </p>
                        <a href="{{ route('frontend.details', $post->id) }}" class="btn btn-primary mt-3">Read More &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
