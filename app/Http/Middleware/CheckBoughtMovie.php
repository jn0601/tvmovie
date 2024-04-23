<?php

namespace App\Http\Middleware;

use App\Models\Movie;
use App\Models\MovieCustomer;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;

class CheckBoughtMovie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $get_customer_id = Session::get('customer_id');
        $movieSeoName = $request->route('seo_name'); // Adjust this based on your route parameter name
        $movie_detail = Movie::has('episode')
        ->where('seo_name', $movieSeoName)
        ->where('status', 1)
        ->first();
        // check giá khác 0
        if ($movie_detail->price != "0 VND") {
            //check mua phim
            $check_bought = MovieCustomer::where('movie_id', $movie_detail->id)
            ->where('customer_id', $get_customer_id)->first();
            if(!$check_bought) {
                Toastr::error('Chưa mua phim này', 'Thất bại');
                return redirect()->back();
            }
            else {
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
        else {
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
}
