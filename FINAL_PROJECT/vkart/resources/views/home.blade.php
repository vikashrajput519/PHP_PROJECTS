@extends('components/layout')

@section('style')
    <style>
        .product-card {
            display: inline-block;
            height: 200px;
            width: 150px;
            padding: 10px;
            margin: 10px;
            border: 2px solid yellow;
            box-shadow: 0 0 10px brown;
        }
        .content-height {
            min-height: 100vh;
        }
    </style>
@endsection

@section('content')
    <div class="content-height">

        @foreach ($products as $product)
            <div class="product-card mb-3">
                <span> {{ $product-> title }}</span>
            </div>
        @endforeach

    </div>
@endsection
