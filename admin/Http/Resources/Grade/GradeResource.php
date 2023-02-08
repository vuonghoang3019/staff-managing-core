<?php

namespace Admin\Http\Resources\Grade;

use Admin\Http\Resources\BaseResource;

class GradeResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'Id' => $this->id,
        ];
    }
}
