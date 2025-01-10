<?php

namespace App\Domain\User\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepository extends RepositoryInterface {
    public function findByEmail(string $email);
}
