<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'color',
            'attributes' => [
                'name' => $this->name,
                'color_code' => $this->color_code,
                'type' => $this->type,
                'display' => $this->name.' ('.$this->type.')',
            ],
        ];
    }
}
