<?php
namespace App\Domain\Product\Actions;

use App\Domain\User\Repositories\UserRepository;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Password;

class GetProductAction
{
    public function __construct(protected ProductRepository $productRepository)
    {
    }
    public function __invoke(string $name)
    {
        return $this->productRepository->getProducts($name);
    }
}
