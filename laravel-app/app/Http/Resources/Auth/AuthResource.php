<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="AuthResource",
 *     type="object",
 *     @OA\Property(
 *     property="accept_token",
 *     type="string",
 *     example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI1ZjIwZjQwZjQwZjQwZjQwZjQwZjQwZjQiLCJpYXQiOjE1OTYwNzQwNzYsImV4cCI6MTU5NjA3NzY3Nn0.7"
 *    )
 * )
 */
class AuthResource extends JsonResource {
    public function toArray($request): array {
        return ['accept_token' => $this['token']];
    }
}
