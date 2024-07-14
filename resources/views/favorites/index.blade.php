@extends('layouts.app')

@section('title', 'Favorites')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Your Favorite Products</h1>
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
                        </div>
                    </div>
                </div>
            @empty
                <p>No favorite products found.</p>
            @endforelse
        </div>
    </div>
@endsection
