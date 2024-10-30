<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Blog MSIB</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome for additional icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Menggunakan Google Fonts */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f8fc;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan body mengambil setidaknya tinggi viewport */
        }

        /* Navbar Styles */
        .navbar {
            background-color: #4CAF50; /* Nuansa hijau */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: #fff;
        }

        .navbar .nav-link {
            color: #fff !important;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #d9f9d9 !important; /* Warna saat hover */
        }

        /* Main Content */
        .container-fluid {
            flex: 1; /* Memungkinkan konten utama untuk mengisi ruang yang tersedia */
        }

        /* User Dropdown */
        .dropdown-menu {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
        }

        .dropdown-item i {
            margin-right: 0.5rem;
            color: #4CAF50; /* Warna ikon */
        }

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
        }

        footer {
            background-color: #303131; /* Warna latar belakang */
            color: #e0d5d5; /* Warna teks */
            padding: 9px;
        }

        footer a {
            color: #d1d8e2; /* Warna tautan */
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #e6d8d8; /* Warna tautan saat hover */
        }
    </style>
</head>
<body>
    <!-- Page Content -->
    <div id="page-content-wrapper" class="d-flex flex-column flex-grow-1">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="#">Blog MSIB</a>
                <!-- Navbar Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">Authors</a>
                    </li>
                </ul>
                <!-- User Dropdown -->
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/30" alt="User" class="rounded-circle me-2">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="bi bi-person me-2"></i> Profile Detail
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /Navbar -->

        <!-- Main Content -->
        <div class="container-fluid mt-4 flex-grow-1">
            @yield('content')

            <!-- Alerts -->
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        <footer class="mt-auto">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <p>&copy; {{ date('Y') }} Syarif Indra</p>
                    </div>
                    <div class="col-md-6 social-icons text-md-end">
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
    </div>
    <!-- /#page-content-wrapper -->

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
