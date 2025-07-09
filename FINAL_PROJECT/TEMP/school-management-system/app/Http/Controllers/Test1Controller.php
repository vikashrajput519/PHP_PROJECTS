<?php
namespace App\Http\Controllers;

class Test1Controller 
{
    public function testFunction() {
        $hello = 'This is hello string';
        return view('test-hello', compact('hello'));
    }

}