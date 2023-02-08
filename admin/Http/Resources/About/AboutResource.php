<?php

namespace Admin\Http\Resources\About;

use Admin\Http\Resources\BaseResource;

class AboutResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'Id' => $this->id,
        ];
    }
}
