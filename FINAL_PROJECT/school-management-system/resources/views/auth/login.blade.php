@extends('components/app-layout')
@section('style')
    <style>
        /* Card styling */
        .login-box {
            max-width: 400px;
            padding: 20px;
            border: 2px solid yellow;
            border-radius: 10px;
            background: white;
            box-shadow: 0 0 10px brown;
            text-align: center;
            margin-top: 70px;
        }

        /* Logo styling */
        .logo-img {
            width: 100px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="login-box">

                {{-- Logo on top --}}
                {{-- <img src={{ 'assets/logo/V-Cart.png' }} alt="V-Cart" class="logo-img"> --}}

                <!-- Login Form -->
                <h4 class="mb-3">School Management System</h4>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="email" placeholder="Email address" id="email" name="email" class="form-control" required>
                        
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="Password" placeholder="Password" id="password" name="password" class="form-control" required>

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox"
                        value="remember-me" id="flexCheckDefault">
                        <label for="flexCheckDefault" class="form-check-label">
                            Remember me
                        </label>
                    </div>

                    @if(session() -> has('success'))
                        <div class="alert alert-success">
                            {{ session() -> get("success") }}
                        </div>
                    @endif

                    @if(session() -> has("error")) 
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100">Submit</button>

                    <div class="mt-3">
                        <a href="#">Forgot Password?</a>
                    </div>

                    {{-- <div class="mt-2">
                        <small>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></small>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>
@endsection
