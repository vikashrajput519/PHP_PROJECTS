@extends('components/app-layout')

@section('title', 'Dashboard')

@section('content')
    <h2>Hello, {{ $user->name }} ({{ ucfirst(strtolower($user->role)) }})</h2>
    <p>Welcome to your dashboard.</p>

    <a href="/" class="btn btn-primary mt-3">
        Students
    </a>

    <a href="/" class="btn btn-primary mt-3">
        </i> Teachers
    </a>

    <a href="/" class="btn btn-primary mt-3">
        </i> Courses
    </a>

@endsection