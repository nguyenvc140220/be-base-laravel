<?php
namespace App\Domain\User\DTO;

class ResetPasswordDTO
{
    private string $token;
    private string $email;
    private string $password;

    public function __construct(string $token, string $email, string $password)
    {
        $this->token = $token;
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['token'],
            $data['email'],
            $data['password']
        );
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}
