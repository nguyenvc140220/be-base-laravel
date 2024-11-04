<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\User\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthApiController extends Controller {
    private AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse {
        try {
            $response = $this->authService->login($request->only(['email', 'password']));

            return $this->sendResponse(new AuthResource($response));
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    public function logout(): JsonResponse {
        try {
            $response = $this->authService->logout();

            return $this->sendResponse($response);
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    public function refresh(): JsonResponse {
        try {
            $response = $this->authService->refreshToken();

            return $this->sendResponse(new AuthResource($response));
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }
}
