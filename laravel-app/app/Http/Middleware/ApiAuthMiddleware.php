<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponseTrait;
use Closure;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthMiddleware
{
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
    public function handle(Request $request, Closure $next, $role = null)
    {
        try {
            $user = $this->jwt->parseToken()->authenticate();

            if (!$user || (isset($role) && $user->role !== $role)) {
                return $this->sendError('Unauthorized', Response::HTTP_UNAUTHORIZED);
            }
        } catch (TokenExpiredException $e) {
            return $this->sendError('Token is expired', Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return $this->sendError('Token is invalid', Response::HTTP_UNAUTHORIZED);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
