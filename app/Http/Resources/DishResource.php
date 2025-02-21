<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->dish_name,
            'price' => number_format($this->price, 2, '-', ''),
            'category' => [
                'id' => $this->category->id,
                'cat_name' => $this->category->cat_name,
            ],
        ];
    }
}
