<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FontResource extends JsonResource
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'font',
            'attributes' => [
                'name' => $this->name,
                'svg' => $this->svg,
                'cost_multiplier' => $this->cost_multiplier,
            ],
        ];
    }
}
