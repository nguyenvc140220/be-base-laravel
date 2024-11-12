<?php

namespace App\Services\User;

use App\Repositories\Contracts\UserRepository;
use Exception;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthService {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws Exception
     */
    public function login(array $credentials): array {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if (!$user) {
            throw new Exception('User not found', ResponseAlias::HTTP_NOT_FOUND);
        }

        if (!password_verify($credentials['password'], $user->password)) {
            throw new Exception('Invalid password', ResponseAlias::HTTP_NOT_FOUND);
        }

        if (!$token = JWTAuth::attempt($credentials)) {
            throw new JWTException('Unauthorized', ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return ['token' => $token];
    }

    public function logout(): true {
        JWTAuth::invalidate(JWTAuth::getToken());

        return true;
    }

    public function refreshToken(): array {
        $token = JWTAuth::refresh(JWTAuth::getToken());

        return ['token' => $token];
    }
}
