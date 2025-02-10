<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {
    public function toArray($request): array {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'price' => $this['price'],
            'description' => $this['description'],
            'created_at' => $this['created_at'],
            'updated_at' => $this['updated_at'],
        ];
    }

}
