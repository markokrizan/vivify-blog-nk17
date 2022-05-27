<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestCounterMiddleware
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
        $reqCount = $request->session()->get('req_count', 0);
        // $reqCount = session('req_count', 0);

        $request->session()->put('req_count', $reqCount + 1);
        // session(['req_count' => $reqCount + 1]);

        return $next($request);
    }
}

// class StartSessionMiddleware {
//     public function handle(Request $request, Closure $next) {
//         $cookie = $request->header('cookie');

//         if ($cookie) {
//             return $next($request);
//         }

//         $sessionId = $this->startSession();

//         $response = $next($request);
//         $response->header('set-cookie', "laravel_session:$sessionId");
//         return $response;
//     }
// }

// [
//     Middleware1,
//     Middleware2,
//     Middleware3,
//     Controller::action
// ]
