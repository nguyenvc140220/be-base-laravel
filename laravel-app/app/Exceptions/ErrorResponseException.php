<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ErrorResponseException extends Exception {
    /**
     * @OA\Schema(
     *     schema="ErrorResponseException",
     *     type="object",
     *
     *     @OA\Property(
     *        property="error",
     *        type="string",
     *        example="Bad Request"
     *    ),
     * )
     */
    public function render() {
        return response()->json(
            [
                'error' => Response::$statusTexts[ResponseAlias::HTTP_BAD_REQUEST],
            ],
            ResponseAlias::HTTP_BAD_REQUEST
        );
    }
}
