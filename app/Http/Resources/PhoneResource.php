<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            'launch' => $this->launch,
            'os' => $this->os,
            'cpu' => $this->cpu,
            'gpu' => $this->gpu,
            'ram' => $this->ram,
            'storage' => $this->storage,
            'size' => $this->size,
            'camera' => $this->camera,
            'speaker' => $this->speaker,
            'battery' => $this->battery,
            'color' => $this->color,
            'phone_img' => $this->phone_img,
            'phones_img' => $this->phones_img,
            'brand_id' => $this->brand->id,
            'prices' => PriceResource::collection($this->prices),
        ];
    }
}
