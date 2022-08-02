<?php

namespace App\Http\Middleware;

use App\Helpers\Constants;
use App\Helpers\HttpHandler;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return HttpHandler::errorMessage('Token is Invalid', 403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'data' => [
                        'refresh_token' => JWTAuth::refresh(JWTAuth::getToken()),
                        'message' => 'Token is Expired'
                    ],
                    'status' => Constants::FAILED
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return HttpHandler::errorMessage('Token is Blacklisted', 400);
            } else {
                return HttpHandler::errorMessage('Authorization Token not found', 404);
            }
        }

        return $next($request);
    }
}
