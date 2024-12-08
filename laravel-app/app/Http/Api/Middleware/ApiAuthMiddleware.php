<?php

namespace App\Http\Api\Middleware;

use App\Enums\UserRoleEnum;
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

    public function __construct(protected JWTAuth $jwt)
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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {
            $user = $this->jwt->parseToken()->authenticate();

            if (!$user) {
                return $this->sendError('Not login yet!!', Response::HTTP_UNAUTHORIZED);
            }

            if ($user->role === UserRoleEnum::Admin->value) {
                return $next($request);
            }

            if (!in_array($user->role, $roles)) {
                return $this->sendError('Unauthorized', Response::HTTP_FORBIDDEN);
            }

            return $next($request);
        } catch (TokenExpiredException $e) {
            return $this->sendError('Token is expired', Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return $this->sendError('Token is invalid', Response::HTTP_UNAUTHORIZED);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
