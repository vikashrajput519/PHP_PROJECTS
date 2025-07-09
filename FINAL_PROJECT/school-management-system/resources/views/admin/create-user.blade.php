@extends('components/app-layout')

@section('title', 'Create User')

@section('content')
    <h2>Create Student or Staff</h2>
    <form action="{{ route('admin.storeUser') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="STUDENT" {{ old('role') == 'STUDENT' ? 'selected' : '' }}>Student</option>
                <option value="STAFF" {{ old('role') == 'STAFF' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success">Create User</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px;">
            <strong>Whoops! Something went wrong:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
