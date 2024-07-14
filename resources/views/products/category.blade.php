@extends('layouts.app')

@section('title', $category . ' Products')

@section('content')
    <h1>{{ $category }} Products</h1>

    <div class="text-center mb-4">
        <a href="{{ route('products.category', ['category' => 'electronics']) }}" class="btn btn-primary btn-lg rounded-pill mx-2">Watches</a>
        <a href="{{ route('products.category', ['category' => 'clothing']) }}" class="btn btn-success btn-lg rounded-pill mx-2">Clothes</a>
        <a href="{{ route('products.category', ['category' => 'shoes']) }}" class="btn btn-danger btn-lg rounded-pill mx-2">Shoes</a>
    </div>

    <h2>{{ $category }} Products</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['title'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text">Price: ${{ $product['price'] }}</p>
                        <p class="card-text">Quantity: {{ $product['quantity'] }}</p>
                        <button>Add cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
