@extends('components/layout')

@section('style')
    <style>
        .product-details-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            padding: 50px;
            max-width: 900px;
            margin: auto;
            margin-top: 20px;
        }

        .product-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-category, .product-tags {
            font-size: 16px;
            color: #555;
        }

        .product-price {
            font-size: 22px;
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }

        .product-stock {
            font-size: 16px;
            font-weight: bold;
            color: red;
            margin-top: 5px;
        }

        .product-description {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }

        .product-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: white;
            text-decoration: none;
            text-align: center;
        }

        .add-to-cart {
            background-color: green;
        }

        .buy-now {
            background-color: red;
        }

    </style>
@endsection

@section('content')
    <div class="product-details-container">
        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-image">

        <div class="product-info">
            <div class="product-title">{{ $product->title }}</div>
            <div class="product-category">Category: Electronics</div>
            {{-- {{ $product->category }} --}}
            <div class="product-tags">Tags: Device</div>
            {{-- {{ implode(', ', $product->tags) }} --}}
            <div class="product-price">Price: ₹{{ number_format($product->price, 2) }}</div>
            <div class="product-stock">Only few in stock
                {{-- {{ $product->stock > 0 ? $product->stock . ' left' : 'Out of Stock' }} --}}
            </div>

            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>

            <div class="product-actions">
                <a href="" class="btn add-to-cart">Add to Cart</a>
                {{-- {{ route('cart.add', $product->id) }} --}}
                <a href="" class="btn buy-now">Buy Now</a>
                {{-- {{ route('buy.now', $product->id) }} --}}
            </div>
        </div>
    </div>
@endsection
