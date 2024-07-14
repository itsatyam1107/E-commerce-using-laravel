<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-Commerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .navbar-nav {
            flex-direction: row;
            margin: 0 300px;
        }
        .navbar-nav .nav-item {
            margin: 0 10px;
            color: white;
            border-radius: 20px;
            padding: 0 10px;
        }
        .navbar-nav .nav-link {
            padding: 8px 0;
        }
        .navbar-brand {
            font-weight: bold;
            margin-left: 40px; /* Adjust this value as needed */
        }
        .navbar-collapse {
            justify-content: center;
        }
        .navbar-collapse ul:last-child {
            margin-left: auto;
        }
    </style>
</head>
<body>
    @yield('navbar') <!-- This will allow individual views to provide their own navbars -->

    <!-- Default Navbar -->
    @if (!view()->hasSection('navbar'))
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Shoplite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('favorites.index') }}"><i class="bi bi-heart"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    @endif

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
