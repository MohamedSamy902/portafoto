<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;



class SetCustomerId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!Cookie::get('customerId')) {
            $response = $next($request);
            $date = Carbon::now()->timestamp;
            $expires = time() + 60 * 60 * 24 * 365; // One Year
            $response->cookie('customerId', $date, $expires); // replace name, value, and minutes with appropriate values

            return $response;
        } else {
            return $next($request);
        }


        // $response->cookie('name', 'value', $minutes);
        //        return $response;

        // $minutes = 1;
        // $response = new Response('Hello World');
        // $response->withCookie(cookie('name', 'virat', $minutes));
        // // cookie('name', 'MOhamed Samy', 60);
        // // $request->withCookie(cookie('name', '55', 60));
        // return $next($request);
    }
}
