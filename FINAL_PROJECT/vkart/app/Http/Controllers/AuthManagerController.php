<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManagerController extends Controller
{
    // Login get
    function login()
    {
        return view('auth.login');
    }

    // Login Post
    function loginPost(Request $request) {
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request -> only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect() -> intended(route('home'));
        }

        return redirect('login') -> with('error', 'Invalid Username and Password!');
    }

    // logout

    function logout() {
        Auth::logout();
        return redirect('login');
    }

    // Register get
    function register()
    {
        return view('auth.register');
    }

    // Register post
    function registerPost(Request $request) {

        $request -> validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);

        // Prepare user object
        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);

        // save user
        if($user -> save()) {
            return redirect() -> intended(route('login'))
            -> with('success', 'You have been registered successfully!');
        }

        return redirect(route('register')) -> with('error', 'Something went wrong');
    }
}
