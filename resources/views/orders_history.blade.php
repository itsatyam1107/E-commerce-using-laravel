@extends('layouts.app')

@section('title', 'Order History')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Order History</h1>

        @if ($orders->isEmpty())
            <p class="text-center">You have no order history.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Details</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>
                                @php
                                    $productDetails = json_decode($order->product_details, true);
                                @endphp
                                <ul class="list-unstyled">
                                    @foreach ($productDetails as $item)
                                        <li>
                                            <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px;">
                                            {{ $item['name'] }} (₹{{ $item['price'] }} x {{ $item['quantity'] }})
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $order->order_date->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('styles')
    <style>
        .list-unstyled li {
            border-bottom: 1px solid #ddd;
            padding: 5px 0;
            display: flex;
            align-items: center;
        }

        .list-unstyled img {
            margin-right: 10px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table td {
            border-bottom: 1px solid #ddd;
        }

        .table {
            border-collapse: collapse;
        }
    </style>
@endsection
