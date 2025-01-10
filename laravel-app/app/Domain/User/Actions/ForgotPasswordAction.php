<?php
namespace App\Domain\User\Actions;

use App\Notifications\ResetPasswordNotification;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Password;

class ForgotPasswordAction
{
    public function __invoke(string $email)
    {
        $response = Password::sendResetLink(
            ['email' => $email],
            function ($user) use ($email) {
                $token = Password::getRepository()->create($user);
                $resetLink = env('RESET_PASSWORD_URL') . '/?token=' . $token . '&email=' . $email;
                $user->notify(new ResetPasswordNotification($resetLink));
            }
        );

        if ($response !== Password::RESET_LINK_SENT) {
            throw new Exception('Password reset failed', Response::HTTP_BAD_REQUEST);
        }

        return true;
    }
}
