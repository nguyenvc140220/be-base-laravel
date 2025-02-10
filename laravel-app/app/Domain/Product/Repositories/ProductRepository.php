<?php

namespace App\Domain\Product\Actions;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ProductRepository extends RepositoryInterface
{
  public function getProducts(string $name);
}
