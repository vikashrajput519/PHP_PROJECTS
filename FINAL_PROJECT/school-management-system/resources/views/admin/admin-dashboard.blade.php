@extends('components/app-layout')

@section('title', 'Admin dashboard')

@section('content')
    <h2>Hello, {{ $user->name }} ({{ ucfirst(strtolower($user->role)) }})</h2>
    <p>Welcome to your dashboard.</p>

    <a href="{{ route('admin.createUser') }}" class="btn btn-primary mt-3">
        <i class="fas fa-user-plus"></i> Create Student/Staff
    </a>
@endsection