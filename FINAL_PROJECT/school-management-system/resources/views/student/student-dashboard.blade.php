@extends('components/app-layout')

@section('title', 'Dashboard')

@section('content')
    <h2>Hello, {{ $user->name }} ({{ ucfirst(strtolower($user->role)) }})</h2>
    <p>Welcome to your dashboard.</p>
@endsection