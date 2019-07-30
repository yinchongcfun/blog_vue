<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Ring\Client\Middleware;
use Illuminate\Support\Facades\Auth;

class Comment extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return response()->json([
                'msg'  => '请登录',
                'code' => 500,
                'data' => null,
            ]);
        }

        return $next($request);
    }
}
