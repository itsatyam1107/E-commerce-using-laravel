<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    public function index()
    {
        // Get all orders
        $orders = Order::orderBy('order_date', 'desc')->get();

        return view('order_history', compact('orders'));
    }
}
