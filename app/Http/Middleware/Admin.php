<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user()->usertype == 'admin')//if the user is an admin we will allow him to access the admin page
        {
            return $next($request);
        }
        ///if the user is not an admin we will not allow him to access the admin page
        return redirect('/');
    }   
}
