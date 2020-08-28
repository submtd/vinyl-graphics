<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FontCollection extends ResourceCollection
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => FontResource::collection($this->collection),
        ];
    }
}
