<?php
namespace App\Domain\User\DTO;

class LoginDTO
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['email'],
            $data['password']
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
