<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo 'Welcome from Middleware!<br>';
        $age = $request-> age;
        if(!empty($age) && $age < 18) {
            echo 'Value of age from pathparame: '.$age.'<br>';
            die("<span style='background-color:#ff00004f; color:red;'>You can not access this page</span>");
        }
        return $next($request);
    }
}
