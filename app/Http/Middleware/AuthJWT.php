<?php

namespace App\Http\Middleware;
use Closure;
use JWTAuth;
use Exception;

class AuthJWT {
    public function handle($request, Closure $next) {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['User not found'], 404);
            }
        }
        catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'invalid token']);
            }
            elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error' => 'token expired']);
            }
            else {
                return response()->json(['error' => 'authentification error']);
            }
        }
        return $next($request);
    }
}