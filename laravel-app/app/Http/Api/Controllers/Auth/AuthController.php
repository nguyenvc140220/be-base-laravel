<?php

namespace App\Http\Api\Controllers\Auth;

use App\Domain\User\Actions\LoginJwtAction;
use App\Domain\User\Actions\LogoutJwtAction;
use App\Domain\User\Actions\RefreshJwtAction;
use App\Http\Api\Requests\Auth\LoginRequest;
use App\Http\Api\Resources\Auth\AuthResource;
use App\Http\Web\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, LoginJwtAction $loginJwtAction): JsonResponse
    {
        try {
            $response = $loginJwtAction($request->toDTO());

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function logout(LogoutJwtAction $logoutJwtAction): JsonResponse
    {
        try {
            $response = $logoutJwtAction();

            return $this->sendResponse($response);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function refresh(RefreshJwtAction $refreshJwtAction): JsonResponse
    {
        try {
            $response = $refreshJwtAction();

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }
}
