<?php

namespace App\Infrastructures\Repositories;

use App\Domain\User\Repositories\UserRepository;
use App\Infrastructures\Models\User;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByEmail(string $email)
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }
}
