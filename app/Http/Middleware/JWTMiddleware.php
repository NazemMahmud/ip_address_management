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
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'data' => [
                        'refresh_token' => JWTAuth::refresh(JWTAuth::getToken()),
                        'message' => 'Token is Expired'
                    ],
                    'status' => Constants::FAILED
                ], 401);
            } else {
                return HttpHandler::errorMessage(Constants::INVALID_TOKEN, 403);
            }
        }

        return $next($request);
    }
}
