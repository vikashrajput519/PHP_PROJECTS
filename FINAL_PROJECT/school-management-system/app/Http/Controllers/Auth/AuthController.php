<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Returns login form
    public function loginForm()
    {
        return view('auth.login');
    }

    // Handels login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Use strtoupper() for case-insensitive comparison if needed
            switch (strtoupper($user->role)) {
                case 'STUDENT':
                    return redirect('/student/dashboard');
                case 'STAFF':
                    //return redirect('/staff/dashboard');
                    return redirect()->route('staff.dashboard');
                default:
                    Auth::logout();
                    return back()->with('error', 'Unauthorized role.');
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function staffDashboard()
    {
        return view('staff/staff-dashboard', ['user' => Auth::user()]);
    }

    public function studentDashboard()
    {
        $user = Auth::user(); // get current logged in user
        return view('student/student-dashboard', compact('user'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'STUDENT',
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
