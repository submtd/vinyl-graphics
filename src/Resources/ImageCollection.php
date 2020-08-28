<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ImageResource::collection($this->collection),
        ];
    }
}
