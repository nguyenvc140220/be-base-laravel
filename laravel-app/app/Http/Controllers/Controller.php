<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info( title="Base Laravel API", version="1.0" )
 * @OA\Server( url="http://localhost:8001/api/v1/" )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * @OA\PathItem ( path="/api/v1" )
 */
class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponseTrait;
}
