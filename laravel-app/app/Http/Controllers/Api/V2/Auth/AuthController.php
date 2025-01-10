<?php

namespace App\Http\Controllers\Api\V2\Auth;

use App\Domain\User\Actions\ForgotPasswordAction;
use App\Domain\User\Actions\LoginJwtAction;
use App\Domain\User\Actions\LogoutJwtAction;
use App\Domain\User\Actions\RefreshJwtAction;
use App\Domain\User\Actions\ResetPasswordAction;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Resources\Auth\AuthResource;
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

    public function forgotPassword(ForgotPasswordRequest $request, ForgotPasswordAction $forgotPasswordAction): JsonResponse
    {
        try {
            $email = $request->validated('email');
            $response = $forgotPasswordAction($email);

            return $this->sendResponse($response);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function resetPassword(ResetPasswordRequest $request, ResetPasswordAction $resetPasswordAction): JsonResponse
    {
        try {
            $response = $resetPasswordAction($request->toDTO());

            return $this->sendResponse($response);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }
}