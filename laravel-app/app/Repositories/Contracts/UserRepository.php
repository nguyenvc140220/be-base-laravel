<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepository extends RepositoryInterface {
    public function findByEmail(string $email);
}
