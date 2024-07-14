@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center bg-glass p-3 rounded">SHOP</h1>

        @php
            $categoryImages = [
                'Clothes' => 'https://img.hunkercdn.com/375/clsd/3/4/4e7f79fab6344408908e260a7fc3a73b.jpg',
                'Shoes' => 'https://swall.teahub.io/photos/small/82-828412_photo-wallpaper-sneakers-nike-lunar-flyknit-one-nike.jpg',
                'Watches' => 'https://usercontent.one/wp/wristreview.com/wp-content/uploads/2019/08/AS_DSTB-OW-2019_profile.jpg?media=1704950470',
            ];
        @endphp

        <!-- Categories Section -->
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="category-container position-relative">
                        <img src="{{ $categoryImages[$category] }}" alt="{{ $category }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <a href="{{ route('user.products.index', ['category' => $category]) }}" class="btn btn-primary">
                                View {{ $category }} Items
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Products Section -->
        @if(request()->query('category'))
            <h2 class="my-4 text-center">Showing {{ request()->query('category') }} Products</h2>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex align-items-stretch">
                        <div class="card h-100 shadow-sm" style="height: 400px;">
                            <img src="{{ $product->img }}" class="card-img-top rounded" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text overflow-hidden" style="flex-grow: 1;">{{ Str::limit($product->description, 60) }}</p>
                                <p class="card-text">Price: ₹{{ $product->price }} INR</p>
                                <p class="card-text">Quantity: {{ $product->quantity }}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-cart"></i> Add to Cart
                                        </button>
                                    </form>
                                    @php
                                        $favorites = session('favorites', []);
                                        $isFavorite = in_array($product->id, $favorites);
                                    @endphp
                                    <form action="{{ route('favorites.toggle', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn {{ $isFavorite ? 'btn-danger' : 'btn-outline-danger' }}">
                                            <i class="bi {{ $isFavorite ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No products available in this category.</p>
                @endforelse
            </div>
        @endif
    </div>

    <style>
        .category-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .category-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Add transparency here */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay a {
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection
