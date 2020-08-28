<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorCollection extends ResourceCollection
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ColorResource::collection($this->collection),
        ];
    }
}
