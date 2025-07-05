@extends('components/layout')

@section('style')
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 60px;
            gap: 15px;
            padding: 20px;
        }

        .product-card {
            width: 200px;
            height: auto;
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
            text-align: center;
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 1px solid yellow;
            transition: transform 0.3s ease-in-out;
        }

        .product-info {
            width: 100%;
            padding: 5px 0;
        }

        .product-title {
            font-size: 16px;
            font-weight: bold;
            color: black;
        }

        .product-tags,
        .product-category,
        .product-price,
        .product-stock {
            font-size: 14px;
            color: #444;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: green;
        }

        .product-stock {
            font-size: 14px;
            font-weight: bold;
            color: red;
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
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .product-actions a {
            color: white;
            text-decoration: none;
            font-size: 12px;
            padding: 4px 9px;
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
        }

        .main-card-link {
            text-decoration: none;
            color: inherit;
        }






        .cart-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-controls button {
            background-color: #ff9800;
            color: white;
            border: none;
            padding: 3px 5px;
            font-size: 14px;
            border-radius: 30%;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .cart-controls button:hover {
            background-color: #e68900;
        }

        .cart-count {
            font-size: 14px;
            font-weight: bold;
            min-width: 20px;
            color: white;
            text-align: center;
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="product-container">
        @foreach ($products as $product)
            <div class="product-card">
                <a href="{{ route('product.details', $product->id) }}" class="main-card-link">
                    <img src="{{ $product->image }}" alt="{{ $product->title }}">

                    <div class="product-info">
                        <div class="product-title">{{ $product->title }}</div>
                        <div class="product-tags">Tags: electronics</div>
                        {{-- {{ implode(', ', $product->tags) }} --}}
                        <div class="product-category">Electronics</div>
                        {{-- Category: {{ $product->category }} --}}
                        <div class="product-price">Price: ₹{{ number_format($product->price, 2) }}</div>
                        <div class="product-stock">Stock: Only few in stock</div>
                        {{-- {{ $product->stock > 0 ? $product->stock . ' left' : 'Out of Stock' }} --}}
                    </div>

                </a>

                <div class="product-actions">
                    <div id="cart-buttons-{{ $product->id }}">
                        @php
                            // $quantity = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0;
                            $quantity = isset($product->quantity) ? $product->quantity : 0;
                            !empty($product->quantity) ? $product->quantity : 0;
                        @endphp

                        @if ($quantity > 0)
                            <div class="cart-controls">
                                <button onclick="updateCart({{ $product->id }}, 'decrement')">−</button>
                                <span id="cart-count-{{ $product->id }}" class="cart-count">{{ $quantity }}</span>
                                <button onclick="updateCart({{ $product->id }}, 'increment')">+</button>
                            </div>
                        @else
                            <a href="javascript:void(0);" onclick="addToCart({{ $product->id }})" class="add-to-cart">Add
                                to Cart</a>
                        @endif
                    </div>
                    <a href="" class="buy-now">Buy</a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $products->links() }}
    </div>
@endsection
@section('script')
    <script>
        function addToCart(productId) {
            @if (!auth()->check())

                window.location.href = "{{ route('login') }}";
            @else
                fetch('{{ route('cart.add') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            productId: productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            document.getElementById('cart-buttons-' + productId).innerHTML = `
                    <div class="cart-controls">
                        <button onclick="updateCart(${productId}, 'decrement')">-</button>
                        <span id="cart-count-${productId}" class="cart-count">${data.quantity}</span>
                        <button onclick="updateCart(${productId}, 'increment')">+</button>
                    </div>`
                            // Refresh the page to update cart count in navbar
                            setTimeout(function() {
                                location.reload(); // Refreshes the page
                            }, 400); // Delay to ensure the update completes
                        }
                    });
            @endif
        }

        function updateCart(productId, action) {
            fetch('{{ route('cart.update') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        productId: productId,
                        action: action
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        if (data.quantity > 0) {
                            document.getElementById('cart-count-' + productId).innerText = data.quantity;
                            // Refresh the page to update cart count in navbar
                            setTimeout(function() {
                                location.reload(); // Refreshes the page
                            }, 400); // Delay to ensure the update completes
                        } else {
                            document.getElementById('cart-buttons-' + productId).innerHTML = `
                        <a href="javascript:void(0);" onclick="addToCart(${productId})" class="add-to-cart">Add to Cart</a>
                    `;
                            // Refresh the page to update cart count in navbar
                            setTimeout(function() {
                                location.reload(); // Refreshes the page
                            }, 400); // Delay to ensure the update completes
                        }
                    }
                });
        }
    </script>
@endsection
