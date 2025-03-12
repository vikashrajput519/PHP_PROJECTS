<?php

namespace App\Http\Controllers;

use App\Rules\AgeValidator;
use App\Rules\UppercaseValidator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function adUser(Request $requestData)
    {
        // echo 'Values by getting in variables.'. '<br>';
        // $name = $requestData-> name;
        // echo 'name ======'. $name . '<br>';

        $requestData -> validate([
            'name' => 'required | min:3 | max:20 | uppercase',
            'email' => new UppercaseValidator(),
            'age' => new AgeValidator(),
            'password' => 'required'
        ], [
            'age.min' => 'Age must be greater than or equal to 18 years!'
        ]);

        // $output = 'Username: ' . $requestData->name . '<br>';
        // $output .= 'Email: ' . $requestData->email . '<br>';
        // $output .= 'Age: ' . $requestData->age . '<br>';
        // $output .= 'Password: ' . $requestData->password . '<br>';
        //return response($output)->header('Content-Type', 'text/html');
        return $requestData;
    }

    function getAllUsers() {
        $users = DB::select('select * from users');
        return view('allUsers', ['users' => $users]);
    }
}
