<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller


{
    public function userIndex(Request $request)
    {
        $category = $request->query('category');

        // Initialize query builder for Product model
        $query = Product::query();

        // Apply filtering based on the category keyword in the description
        if ($category) {
            $categoryKeywords = [
                'Clothes' => ['sleeve', 'Sleeve', 'T-shirt', 'Shirts', 'Jeans', 'jeans'],
                'Shoes' => ['Shoes', 'shoes', 'sneakers', 'Sneakers'],
                'Watches' => ['Watch', 'Watches', 'watch', 'watches', 'WATCH', 'WATCHES'],
            ];

            if (array_key_exists($category, $categoryKeywords)) {
                $keywords = $categoryKeywords[$category];
                $query->where(function($q) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $q->orWhere('description', 'like', "%{$keyword}%");
                    }
                });
            }
        }

        $products = $query->get();
        $categories = ['Clothes', 'Shoes', 'Watches']; // Add your categories here

        return view('userindex', compact('products', 'categories'));
    }
   

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
