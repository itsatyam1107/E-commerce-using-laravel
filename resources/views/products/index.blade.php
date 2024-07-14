@extends('layouts.app')

@section('title', 'Products')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item admin-only">
                <a class="nav-link" href="{{ route('products.index') }}">Inventory</a>
            </li>
            <li class="nav-item admin-only">
                <a class="nav-link" href="#">Activity</a>
            </li>
            <li class="nav-item user-only">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('home') }}" data-type="user">User</a></li>
                    <li><a class="dropdown-item" href="#" data-type="admin">Admin</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@endsection

@section('content')
    <div class="container">
        <h1 class="my-4">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add Product</a>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex align-items-stretch">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->img }}" class="card-img-top rounded" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text overflow-hidden" style="flex-grow: 1;">{{ Str::limit($product->description, 60) }}</p>
                            <p class="card-text">Price: ${{ $product->price }}</p>
                            <p class="card-text">Quantity: {{ $product->quantity }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <!-- Edit Button -->
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .btn-warning {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            color: #212529;
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .card {
            overflow: hidden;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 0.75rem;
        }

        .card-footer .btn {
            margin: 0;
            height: 30px; /* Adjust height as needed */
            line-height: 1.5;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem; /* Adjust padding for small buttons */
            font-size: 0.875rem;
            border-radius: 0.2rem;
        }

        .card .btn {
            margin: 0;
        }

        .d-flex {
            margin-bottom: 0; /* Ensure that the form does not add extra space */
        }
    </style>
@endsection
