<?php

namespace Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected function GetRelation($relation, $field)
    {
        if (is_null($relation)) return null;

        return $relation->{$field};
    }
}
