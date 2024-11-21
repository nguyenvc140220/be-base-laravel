<?php
namespace App\Domain\User\Actions;

use App\Domain\User\DTO\LoginDTO;
use App\Domain\User\Repositories\UserRepository;
use Exception;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class LoginJwtAction
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function handle(LoginDTO $loginDTO)
    {
        $user = $this->userRepository->findByEmail($loginDTO->email);

        if (!$user) {
            throw new Exception('User not found', Response::HTTP_NOT_FOUND);
        }

        if (!password_verify($loginDTO->password, $user->password)) {
            throw new Exception('Invalid password', Response::HTTP_NOT_FOUND);
        }

        if (!$token = JWTAuth::attempt($loginDTO->toArray())) {
            throw new JWTException('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return ['token' => $token];
    }
}
