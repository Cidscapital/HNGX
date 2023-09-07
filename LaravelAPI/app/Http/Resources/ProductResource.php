<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'detail' => $this->detail,
            'cinema1' => $this->cinema1,
            'cinema2' => $this->cinema2,
            'cinema3' => $this->cinema3,
            'release_year' => $this->release_year,
            'duration' => $this->duration,
            'show_time' => $this->show_time,
            'price' => $this->price,
            'image' => $this->image,
            'timeline' =>$this->timeline,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
