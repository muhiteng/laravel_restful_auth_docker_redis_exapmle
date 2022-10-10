<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'orders' => OrderResource::collection($this->whenLoaded('orders'))
        ];

    }
}
