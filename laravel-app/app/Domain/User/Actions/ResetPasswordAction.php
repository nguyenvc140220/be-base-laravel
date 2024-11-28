<?php
namespace App\Domain\User\Actions;

use App\Domain\User\DTO\ResetPasswordDTO;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordAction
{
    public function __invoke(ResetPasswordDTO $resetPasswordDTO)
    {
        $response = Password::reset(
            $resetPasswordDTO->toArray(),
            function ($user) use ($resetPasswordDTO) {
                $user->forceFill([
                    'password' => Hash::make($resetPasswordDTO->getPassword()),
                ])->save();
            }
        );

        if ($response !== Password::PASSWORD_RESET) {
            throw new Exception('Password reset failed', Response::HTTP_BAD_REQUEST);
        }

        return true;
    }
}
