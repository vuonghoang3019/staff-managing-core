<?php

namespace Admin\Http\Resources\Course;

use Admin\Http\Resources\BaseResource;

class CourseResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'Id' => $this->id,
        ];
    }
}
