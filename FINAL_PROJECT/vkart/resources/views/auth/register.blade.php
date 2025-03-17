@extends('components/layout')

@section('style')
    <style>

        .register-form {
            max-width: 400px;
            padding: 20px;
            border: 2px solid yellow;
            border-radius: 10px;
            background: white;
            box-shadow: 0 0 10px brown;
            text-align: center;
            margin-top: 50px;
        }

        .logo-img {
            width: 100px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="register-form">
                {{-- Logo image --}}
                <img src={{ 'assets/logo/V-cart.png' }} alt="V-Cart" class="logo-img">

                <h4 class="mb-3">Register to V-Cart</h4>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" placeholder="Name" name="name" id="name" class="form-control"
                            required>
                        
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" placeholder="Email address" name="email" id="email" class="form-control"
                            required>

                        @error('email')
                            <span class="text-denger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control"
                            required>

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if(session() -> has('error'))
                        <div class="alert alert-danger">
                            {{ session("error")}}
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100">Submit</button>

                    <div class="mt-3">
                        <a href="{{ route('login') }}">Already Registered?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
