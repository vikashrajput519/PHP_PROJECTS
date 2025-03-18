@extends('components/layout')

@section('style')
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Centers cards in the row */
            gap: 15px;
            /* Space between cards */
            padding: 20px;
        }

        .product-card {
            width: 180px;
            height: 200px;
            padding: 10px;
            border: 1px solid yellow;
            box-shadow: 0 0 8px brown;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            position: relative;
            background: white;
            overflow: hidden;
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 1px solid yellow;
            transition: transform 0.3s ease-in-out;
        }

        /* Black stripe - Initially hidden */
        .product-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 5px;
            display: flex;
            justify-content: space-around;
            opacity: 0;
            /* Hidden by default */
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .product-actions a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .add-to-cart {
            background: green;
        }

        .buy-now {
            background: red;
        }

        /* Hover effect */
        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .product-card:hover img {
            transform: scale(1.05);
            /* Slight zoom effect */
        }
    </style>
@endsection

@section('content')
    <div class="content-height">
        <div class="container">
            <div class="product-container">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ $product -> image}}"
                            alt="{{ $product->title }}">
                        <div class="product-info">
                            <span>{{ $product->title }}</span>
                        </div>
                        <div class="product-actions">
                            <a href="" class="add-to-cart">Add to Cart</a>
                            {{-- {{ route('cart.add', $product->id) }} --}}
                            <a href="" class="buy-now">Buy</a>
                            {{-- {{ route('buy.now', $product->id) }} --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
