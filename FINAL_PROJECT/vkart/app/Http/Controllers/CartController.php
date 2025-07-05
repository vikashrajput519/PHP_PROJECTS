<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ], 404);
        }

        $user = $this->getUserDetails();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated.'
            ], 401);
        }

        $cart = session()->get('cart', []);

        // Update DB
        $existingCart = Cart::where('userId', $user->id)
            ->where('productId', $productId)
            ->first();

        if ($existingCart) {
            $existingCart->quantity += 1;
            $existingCart->save();
        } else {
            $existingCart = new Cart();
            $existingCart->userId = $user->id;
            $existingCart->productId = $productId;
            $existingCart->quantity = 1;
            $existingCart->save();
        }

        // Update session
        $cart[$productId] = [
            'productId' => $productId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $existingCart->quantity,
        ];

        session()->put('cart', $cart);

        $cartCount = Cart::where('userId', $user->id)->count();

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart.',
            'cart' => $cart,
            'quantity' => $cart[$productId]['quantity'],
            'cartCount' => $cartCount
        ]);
    }


    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $action = $request->input('action');

        $user = $this->getUserDetails();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated.'
            ], 401);
        }

        $cart = session()->get('cart', []);

        // Update DB
        $existingCart = Cart::where('userId', $user->id)
            ->where('productId', $productId)
            ->first();

        if ($existingCart) {
            if ($action == 'increment') {
                $existingCart->quantity += 1;
                $existingCart->save();
                $cart[$productId]['quantity'] = $existingCart->quantity;
            } elseif ($action == 'decrement' && $existingCart->quantity >= 1) {
                $existingCart->quantity -= 1;
                if ($existingCart->quantity <= 0) {
                    $existingCart->delete(); // Delete the record if quantity is 0 or less
                } else {
                    $existingCart->save(); // Otherwise, save the updated quantity
                }
                $cart[$productId]['quantity'] = $existingCart->quantity;
            }
        }

        $product = Product::find($productId);
        // Update session
        $cart[$productId] = [
            'productId' => $productId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $existingCart->quantity,
        ];


        session()->put('cart', $cart);

        $cartCount = Cart::where('userId', $user->id)->count();

        return response()->json([
            'status' => 'success',
            'cart' => $cart,
            'quantity' => $existingCart->quantity,
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
