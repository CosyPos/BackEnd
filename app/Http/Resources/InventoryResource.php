<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'dish_id' => $this->dish_id,
            'id' => $this->id,
            'quantity' => $this->quantity,
            'availability' => $this->availability,
        ];
    }
}
