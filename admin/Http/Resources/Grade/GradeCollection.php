<?php

namespace Admin\Http\Resources\Grade;

use Admin\Http\Resources\BaseCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GradeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => $this->collection,
            'pagination' => [
                'total'        => $this->total(),
                'count'        => $this->count(),
                'per_page'     => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages'  => $this->lastPage(),
                //                'from'         => $this->firstItem(),
                //                'last_page'    => $this->lastItem(),
            ],
        ];
    }
}
