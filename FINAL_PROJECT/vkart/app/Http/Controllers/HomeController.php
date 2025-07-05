<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home()
    {
        // $products = Product::all();

        $user = $this->getUserDetails();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated.'
            ], 401);
        }

        $userId = $user->id; // get user id

        // Load products
        $products = Product::paginate(10);

        // Get all cart items for this user, indexed by productId
        $cartItems = Cart::where('userId', $userId)->get()->keyBy('productId');
        //return view('home', ['products' => $products]);

        // to get session data here if session cart is null then its setting empty session => $cart = session('cart', []);

        //Product::with(['carts' => function ($query) use ($userId) {
        // $products = Product::with(['carts' => function ($query) use ($userId) {
        // $query->where('userId', $userId);
        // }])->paginate(10);

        // Attach cart quantity to each product
        foreach ($products as $product) {
            $product->quantity = $cartItems[$product->id]->quantity ?? 0;
        }
        session()->forget('cart'); // Remove only the 'cart' key from session

        // Getting Product added in card for loggedIn user
        $cartCount = $cartItems->count();

        $cart = []; // Fresh cart - on refresh page empty session
        //return view('home', compact('products', 'cart', 'cartCount'));
        // above line same meaning - return view('home', ['products' => $products, 'cart' => $cart]);
        return view('home', [
        'products' => $products,
        'cart' => $cart,
        'cartCount' => $cartCount
        ]);
    }

    public function getUserDetails()
    {
        $user = Auth::user();

        if ($user) {
            return $user;
        } else {
            return null;
        }
    }
}
