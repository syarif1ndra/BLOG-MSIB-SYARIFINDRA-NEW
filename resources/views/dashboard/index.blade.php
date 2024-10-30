@extends('layouts.sidebar')

@section('content')
    <h1 class="mb-4 text-success">Welcome to Your MSIB Blog Home Page</h1>

    <!-- Total Cards Section -->
    <div class="row mb-4">
        <!-- Total Categories Card -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #4caf50; border-radius: 10px;">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-tags fs-5 me-2"></i>
                    <div>
                        <h6 class="card-title mb-1">Total Categories</h6>
                        <p class="card-text fs-4 mb-0">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Posts Card -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #388e3c; border-radius: 10px;">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-file-earmark-text fs-5 me-2"></i>
                    <div>
                        <h6 class="card-title mb-1">Total Posts</h6>
                        <p class="card-text fs-4 mb-0">{{ $totalPosts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Authors Card -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #66bb6a; border-radius: 10px;">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-person fs-5 me-2"></i>
                    <div>
                        <h6 class="card-title mb-1">Total Authors</h6>
                        <p class="card-text fs-4 mb-0">{{ $totalAuthors }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Tables Section -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Recent Posts Table -->
            <div class="card border-0 shadow" style="border-radius: 10px;">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center" style="border-radius: 10px 10px 0 0;">
                    <h5 class="mb-0">Recent Posts</h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPosts as $post)
                                <tr>
                                    <td>{{ Str::limit($post->title, 30) }}</td>
                                    <td><span class="badge bg-secondary">{{ $post->category->name }}</span></td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>{{ $post->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No posts available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <!-- Recent Categories Table -->
            <div class="card border-0 shadow" style="border-radius: 10px;">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center" style="border-radius: 10px 10px 0 0;">
                    <h5 class="mb-0">Recent Categories</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCategories as $category)
                                <tr>
                                    <td>{{ Str::limit($category->name, 20) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="1" class="text-center text-muted">No categories available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <!-- Recent Authors Table -->
            <div class="card border-0 shadow" style="border-radius: 10px;">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center" style="border-radius: 10px 10px 0 0;">
                    <h5 class="mb-0">Recent Authors</h5>
                    <a href="{{ route('authors.index') }}" class="btn btn-light btn-sm">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAuthors as $author)
                                <tr>
                                    <td>{{ Str::limit($author->name, 20) }}</td>
                                    <td>{{ $author->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">No authors available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    body {
        background-color: #e8f5e9; /* Latar belakang halaman hijau lembut */
    }
    h1, h5 {
        color: #2e7d32;
    }
    .table-hover tbody tr:hover {
        background-color: #c8e6c9; /* Warna latar belakang saat hover */
    }
    .badge {
        font-size: 0.85rem;
    }
</style>
