<?php

namespace App\Http\Api\Controllers;

use App\Domain\User\Actions\LoginJwtAction;
use App\Domain\User\Actions\LogoutJwtAction;
use App\Domain\User\Actions\RefreshJwtAction;
use App\Domain\User\DTO\LoginDTO;
use App\Http\Api\Requests\Auth\LoginRequest;
use App\Http\Api\Resources\Auth\AuthResource;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, LoginJwtAction $loginJwtAction): JsonResponse
    {
        try {
            $loginDTO = LoginDTO::fromRequest($request->validated());
            $response = $loginJwtAction->handle($loginDTO);

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function logout(LogoutJwtAction $logoutJwtAction): JsonResponse
    {
        try {
            $response = $logoutJwtAction->handle();

            return $this->sendResponse($response);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function refresh(RefreshJwtAction $refreshJwtAction): JsonResponse
    {
        try {
            $response = $refreshJwtAction->handle();

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }
}
