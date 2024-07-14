<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle($productId)
    {
        $favorites = session('favorites', []);

        if (in_array($productId, $favorites)) {
            $favorites = array_filter($favorites, fn($id) => $id !== $productId);
        } else {
            $favorites[] = $productId;
        }

        session()->put('favorites', $favorites);

        return redirect()->back()->with('success', 'Favorite status updated.');
    }

    public function index()
    {
        $favorites = session('favorites', []);
        // Fetch favorite products from the database or API
        $products = \App\Models\Product::whereIn('id', $favorites)->get();

        return view('favorites.index', compact('products'));
    }
}
