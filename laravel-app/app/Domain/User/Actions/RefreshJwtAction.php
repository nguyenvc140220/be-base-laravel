<?php
namespace App\Domain\User\Actions;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class RefreshJwtAction
{
    public function handle()
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());

        return ['token' => $token];
    }
}
