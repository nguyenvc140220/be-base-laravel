<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Domain\Product\Actions\GetProductAction;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Auth\GetProductRequest;

use App\Http\Resources\Auth\AuthResource;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{

    public function getProducts(GetProductRequest $request, GetProductAction $getProductAction) : JsonResponse
    {
        try {
            $response = $getProductAction($request->toDTO());

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function create(GetProductRequest $request, GetProductAction $getProductAction) : JsonResponse
    {
        try {
            $response = $getProductAction($request->toDTO());

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function update(GetProductRequest $request, GetProductAction $getProductAction) : JsonResponse
    {
        try {
            $response = $getProductAction($request->toDTO());

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }

    public function addAttributes(GetProductRequest $request, GetProductAction $getProductAction) : JsonResponse
    {
        try {
            $response = $getProductAction($request->toDTO());

            return $this->sendResponse(AuthResource::make($response));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), $e->getCode());
        }
    }


}
