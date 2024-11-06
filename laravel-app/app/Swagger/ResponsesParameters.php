<?php

namespace App\Swagger;

class ResponsesParameters {

    /**
     * @OA\Response(
     *      response="bad_request_response",
     *      description="Bad Request",
     *      @OA\JsonContent(
     *           @OA\Property(
     *               property="message",
     *               type="string",
     *               example="Bad Request"
     *           ),
     *           @OA\Property(
     *               property="data",
     *               type="object"
     *           )
     *       )
     * ),
     * @OA\Response(
     *      response="unauthorized_response",
     *      description="Unauthorized",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="message",
     *              type="string",
     *              example="Unauthorized"
     *          ),
     *          @OA\Property(
     *              property="data",
     *              type="object"
     *          )
     *      )
     * ),
     * @OA\Response(
     *      response="login_success_response",
     *      description="successful operation",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              type="object",
     *              ref="#/components/schemas/AuthResource"
     *          ),
     *          @OA\Property(
     *              property="message",
     *              type="string",
     *              example="ok"
     *          )
     *      )
     *  ),
     * @OA\Response(
     *       response="logout_success_response",
     *       description="successful operation",
     *       @OA\JsonContent(
     *           @OA\Property(
     *               property="data",
     *               type="boolean",
     *               example=true
     *           ),
     *           @OA\Property(
     *               property="message",
     *               type="string",
     *               example="ok"
     *           )
     *       )
     *   ),
     */
    public function defineResponsesParameters() { }
}
