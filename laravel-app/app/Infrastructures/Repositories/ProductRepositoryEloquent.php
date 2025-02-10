<?php

namespace App\Infrastructures\Repositories;

use App\Domain\Product\Actions\ProductRepository;
use App\Infrastructures\Models\Products;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Products::class;
  }

  /**
   * Boot up the repository, pushing criteria
   */
  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

  public function getProducts(string $name)
  {
    return $this->model
      ->where('name',  'LIKE', '%' . $name . '%')
    ;
  }
}
