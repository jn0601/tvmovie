<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::user();
        if ($admin instanceof \App\Models\Admin && $admin->hasRole('Quản trị viên')) {
            return $next($request);
        }
        // Redirect or perform any other action for unauthorized access
        return redirect::to('admin'); // Adjust the route as needed
    }
}
