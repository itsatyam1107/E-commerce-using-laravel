@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Your Cart</h1>

        <div class="row">
            <!-- Cart Details Section -->
            <div class="col-lg-8">
                @if ($cart)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $id => $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px;">
                                        {{ $item['name'] }}
                                    </td>
                                    <td>₹{{ $item['price'] }} INR</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control quantity-input" value="{{ $item['quantity'] }}" min="1" data-id="{{ $id }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary update-quantity" type="button" data-id="{{ $id }}">Update</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>

            <!-- Cart Summary Section -->
            <div class="col-lg-4">
                <div class="border p-3 bg-light rounded">
                    <h4>Cart Summary</h4>

                    <!-- Product List in Cart -->
                    @if ($cart)
                        <ul class="list-unstyled">
                            @foreach ($cart as $item)
                                <li class="d-flex justify-content-between mb-2">
                                    <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                                    <span>₹{{ $item['price'] * $item['quantity'] }} INR</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <hr>
                    <div class="d-flex justify-content-between mt-2">
                        <strong>Total Amount:</strong>
                        <strong>₹{{ $totalAmount }} INR</strong>
                    </div>
                    <a href="{{ route('cart.checkout') }}" class="btn btn-success btn-block mt-3">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update quantity using AJAX
            let updateButtons = document.querySelectorAll('.update-quantity');
            updateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-id');
                    let quantityInput = document.querySelector('.quantity-input[data-id="' + productId + '"]');
                    let newQuantity = parseInt(quantityInput.value);

                    fetch('{{ route('cart.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: productId,
                            quantity: newQuantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert('Failed to update quantity. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again later.');
                    });
                });
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        .table th, .table td {
            vertical-align: middle;
        }

        .btn-danger {
            width: 100%;
        }

        .btn-success {
            width: 100%;
        }

        .list-unstyled li {
            border-bottom: 1px solid #ddd;
            padding: 5px 0;
        }

        .list-unstyled li:last-child {
            border-bottom: none;
        }

        .quantity-input {
            max-width: 70px;
        }

        .update-quantity {
            cursor: pointer;
        }
    </style>
@endsection
