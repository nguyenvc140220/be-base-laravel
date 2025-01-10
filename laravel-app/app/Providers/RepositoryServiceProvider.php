<?php

namespace App\Providers;

use App\Domain\User\Repositories\UserRepository;
use App\Infrastructures\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        UserRepository::class => UserRepositoryEloquent::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach ($this->repositories as $contract => $repository) {
            $this->app->singleton($contract, $repository);
        }
    }
}
