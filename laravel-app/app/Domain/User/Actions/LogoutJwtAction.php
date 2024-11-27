<?php
namespace App\Domain\User\Actions;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LogoutJwtAction
{
    public function __invoke()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return true;
    }
}
