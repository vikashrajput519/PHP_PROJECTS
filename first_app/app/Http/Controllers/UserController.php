<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser() {
        return 'Vikash Singh';
    }

    function about() {
        return 'About Us';
    }

    function getName($name) {
        return 'Hello this is '. $name;
    }

    function getViewPage() {
        // Returning view page mean html or blade file
        return view('user');
    }

    function getViewWithParameter($name) {
        echo 'Hello from view with parameter: '. $name;
        return view('viewWithParameter', ['parameterValue' => $name]);
    }
}
