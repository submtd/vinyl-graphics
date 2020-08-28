<?php

namespace Submtd\VinylGraphics\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * To array.
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'image',
            'attributes' => [
                'name' => $this->name,
                'filename' => $this->filename,
                'extension' => $this->extension,
            ],
        ];
    }
}
