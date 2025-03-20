<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // function getAllProducts() {
    //     $products = Product::all();

    //     return view('products', ['products' => $products]);
    // }

    function getProductById($productId) {
        
        // Fetch product by ID
        $product = Product::find($productId);

         // If product not found, show 404 page
         if(!$product) {
            abort(404, 'Product not found');
         }
        
         return view('product-details', compact('product'));
    }
}
