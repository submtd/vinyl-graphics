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
                'cost_per_character' => $this->cost_per_character,
                'border_cost_per_character' => $this->border_cost_per_character,
                'enabled_for_color' => $this->enabled_for_color,
                'enabled_for_border' => $this->enabled_for_border,
            ],
        ];
    }
}
