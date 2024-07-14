<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            overflow-x: hidden;
        }
        .navbar-nav {
            flex-direction: row;
            margin: 0 400px;
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
        .hero-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80vh;
            background-color: #fff;
            padding: 2rem;
            background-size: cover;
            background-position: center;
        }
        .hero-text {
            flex: 1;
            text-align: left;
            padding-right: 2rem;
        }
        .hero-text h1 {
            font-size: 110px;
            
            margin-bottom: 1rem;
            color: grey
        }
        .hero-text p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            color: #555;
        }
        .hero-button {
           
             color: black;
             padding: 0.75rem 1.5rem;
   
                font-size: 1.1rem;
                text-decoration: none;
                transition: background-color 0.3s ease, color 0.3s ease;
                border: 2px solid;
    
        }
        
        .hero-button .bi {
            margin-left: 0.5rem;
        }
        .image-slider {
            flex: 1;
            position: relative;
            height: 100%;
            overflow: hidden;
        }
        .image-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }
        .image-slider img.active {
            opacity: 1;
        }
        .categories-section {
            display: flex;
            justify-content: space-between;
            padding: 2rem;
            gap: 5rem;
            display: flex;
            width: 86vw;
            margin: auto;
        }
        .category {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 331px; /* Adjust the height of the category images */
        }
        .category img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .category:hover img {
            transform: scale(1.05);
        }
        .category button {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .category button:hover {
            background-color: #007bff;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
        }
        footer a {
            color: #6c757d;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       
    <a class="navbar-brand" href="{{ route('home') }}">
            <img src="https://cdn-icons-png.flaticon.com/512/6276/6276315.png" alt="ShopLite Logo" width="57px" height="52px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
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

    <!-- Main Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>ShopLite</h1>
            <p>Discover the best fashion styles at unbeatable prices.</p>
            <a href="{{ route('user.products.index') }}" class="hero-button" >
                Shop Now
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
        <div class="image-slider">
            <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="active" alt="Slider Image 1">
            <img src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slider Image 2">
            <img src="https://www.apple.com/in/apple-watch-se/images/overview/hero/hero__d5yx0jn6usae_large.jpg" alt="Slider Image 3">
        </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-section">
        <div class="category">
            <img src="https://images.unsplash.com/photo-1559582798-678dfc71ccd8?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Men's Clothes">
            <button>Men's Clothes</button>
        </div>
        <div class="category">
            <img src="https://images.pexels.com/photos/974911/pexels-photo-974911.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Women's Clothes">
            <button>Women's Clothes</button>
        </div>
        <div class="category">
            <img src="https://cdn.giftstoindia24x7.com/ASP_Img/IMG2000/GTI438751.jpg" alt="Accessories">
            <button>Accessories</button>
        </div>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Blog</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Latest Posts</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Help</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Careers</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Job Openings</a></li>
                        <li><a href="#">Internships</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-3">
                <p>&copy; 2024 ShopLite. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slider = document.querySelector('.image-slider');
            const images = slider.querySelectorAll('img');
            let currentIndex = 0;

            setInterval(() => {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }, 3000);
        });
    </script>
</body>
</html>
