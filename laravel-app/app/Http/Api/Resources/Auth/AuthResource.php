<?php

namespace App\Http\Api\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource {
    public function toArray($request): array {
        return ['accept_token' => $this['token']];
    }
}
