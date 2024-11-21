<?php
namespace App\Domain\User\Actions;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LogoutJwtAction
{
    public function handle()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return true;
    }
}
