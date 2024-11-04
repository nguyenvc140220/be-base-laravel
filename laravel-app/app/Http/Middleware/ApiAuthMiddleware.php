<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class ApiAuthMiddleware {
    use ApiResponseTrait;

    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        try {
            if (!$this->jwt->parseToken()->authenticate()) {
                return $this->sendError('Unauthorized', 401);
            }
        } catch ( TokenExpiredException $e ) {
            return $this->sendError('Token is expired', 401);
        } catch ( JWTException $e ) {
            return $this->sendError('Token is invalid', 401);
        }

        return $next($request);
    }
}
