<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if 'customer_id' exists in the session
        if (Session::get('admin_type') == 99) {
            return $next($request);
        } 
        // else {
        //     $admin = Auth::user();
        //     if ($admin instanceof \App\Models\Admin && $admin->hasRole('Quản trị viên')) {
        //         return $next($request);
        //     }
        // }
        // Redirect or perform any other action for unauthorized access
        return redirect::to('admin'); // Adjust the route as needed
    }
}

// if ($user->hasAnyRole(['admin', 'editor'])) {
//     // User has at least one of the specified roles
// }
