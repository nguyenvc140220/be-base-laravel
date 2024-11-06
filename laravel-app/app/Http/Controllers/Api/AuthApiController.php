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

    /**
     * @OA\Post(
     *      path="/login",
     *      tags={"Auth"},
     *      summary="Login",
     *      operationId="login",
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=400,
     *          ref="#/components/responses/bad_request_response"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          ref="#/components/responses/unauthorized_response"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          ref="#/components/responses/login_success_response"
     *      )
     *  )
     */
    public function login(LoginRequest $request): JsonResponse {
        try {
            $response = $this->authService->login($request->only(['email', 'password']));

            return $this->sendResponse(new AuthResource($response));
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     *      path="/logout",
     *      tags={"Auth"},
     *      summary="Logout",
     *      operationId="logout",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=400,
     *          ref="#/components/responses/bad_request_response"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          ref="#/components/responses/unauthorized_response"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          ref="#/components/responses/logout_success_response"
     *      )
     *  )
     */
    public function logout(): JsonResponse {
        try {
            $response = $this->authService->logout();

            return $this->sendResponse($response);
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     *      path="/refresh-token",
     *      tags={"Auth"},
     *      summary="Refresh Token",
     *      operationId="refreshToken",
     *      security={{"bearerAuth": {}}},
     *      @OA\Response(
     *          response=400,
     *          ref="#/components/responses/bad_request_response"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          ref="#/components/responses/unauthorized_response"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          ref="#/components/responses/login_success_response"
     *      )
     *  )
     */
    public function refresh(): JsonResponse {
        try {
            $response = $this->authService->refreshToken();

            return $this->sendResponse(new AuthResource($response));
        } catch ( Exception $e ) {
            return $this->sendError($e->getMessage(), $e->getCode() ?? ResponseAlias::HTTP_BAD_REQUEST);
        }
    }
}
