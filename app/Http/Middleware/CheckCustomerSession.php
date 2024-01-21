<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckCustomerSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if 'customer_id' exists in the session
        if (Session::has('customer_id')) {
            return $next($request);
        }

        // Redirect or perform any other action for unauthorized access
        return redirect()->route('view_login'); // Adjust the route as needed

        // return $next($request);
    }
}
