<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponseTrait {
    public function sendResponse($data, $message = 'ok', $code = ResponseAlias::HTTP_OK, $extraData = []): JsonResponse {
        return Response::json($this->makeResponse($message, $data, $extraData), $code);
    }

    private function makeResponse($message = 'ok', $data = [], array $extraData = []): array {
        $response = ['data' => $data, 'message' => $message,];

        if (!empty($extraData)) {
            $response = array_merge($response, $extraData);
        }

        return $response;
    }

    public function sendError($message = '', $code = ResponseAlias::HTTP_BAD_REQUEST, $data = []): JsonResponse {
        return Response::json($this->makeError($message, $data), $code);
    }

    private function makeError($message = '', $data = []): array {
        return ['data' => $data, 'message' => $message];
    }
}
