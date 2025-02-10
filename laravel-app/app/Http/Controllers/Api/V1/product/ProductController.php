<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Auth\GetProductRequest;

use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

  public function getProduct(GetProductRequest $request, GetProductAction $getProductAction) : JsonResponse
  {
   
  }
}