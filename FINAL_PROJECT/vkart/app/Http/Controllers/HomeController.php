<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home() {
        // $products = Product::all();
        $products = Product::paginate(10);
        //return view('home', ['products' => $products]);
        return view('home', compact('products'));
    }
}
