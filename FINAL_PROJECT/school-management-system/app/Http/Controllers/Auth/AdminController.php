<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRoles;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller {
    
    // Will return Login form
    public function loginForm() { return view('admin.login'); }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = UserRoles::ADMIN->value;

        if (Auth::attempt($credentials)) {
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid admin credentials');
    }

    public function dashboard()
    {
        $user = Auth::user(); // get current logged in user
        return view('admin/admin-dashboard', compact('user'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required|in:STUDENT,STAFF',
            'password' => 'required|min:5',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make($request->password),
        ]);

        //dd('storeUser called-3');
        return redirect()->route('admin.dashboard')->with('success', 'User created successfully');
    }
}
