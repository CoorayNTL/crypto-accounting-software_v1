<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Authenticate
{
    /** 
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Try to authenticate the user via the JWT token
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            // If JWT token is missing or invalid, return error response
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Attach the user to the request so it can be accessed in controllers
        $request->merge(['auth' => $user]);

        // Proceed with the next middleware or controller action
        return $next($request);
    }
}
