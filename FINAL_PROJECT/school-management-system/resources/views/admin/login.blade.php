@extends('components/app-layout')

@section('title', 'Admin Login')

@section('content')
    <h2>Admin Login</h2>
    <form action="/admin/login" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email (Admin Only)</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-danger">Login as Admin</button>
    </form>
@endsection