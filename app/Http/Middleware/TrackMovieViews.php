<?php

namespace App\Http\Middleware;

use App\Models\Movie;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class TrackMovieViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $movieSeoName = $request->route('seo_name'); // Adjust this based on your route parameter name
        $ipAddress = $request->ip();

        // Use cache to prevent multiple views from the same IP in a short timeframe
        $cacheKey = "movie_views_{$movieSeoName}_{$ipAddress}";
        $canIncrement = Cache::add($cacheKey, true, now()->addMinutes(10));

        if ($canIncrement) {
            // Increment the views column in the database
            Movie::where('seo_name', $movieSeoName)->increment('count_view');
        }
        return $next($request);
    }
}
