<?php

namespace Admin\Repos\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SortBy
{
    private $sorts = [];

    public function sortBy(Builder $builder, string $sortKey = 'sort', string $orderKey = 'order'): Builder
    {
        try {
            if (count($this->sorts) <= 0 || empty(request($sortKey, '')) || empty(request($orderKey, ''))) return $builder;

            $direction = $this->getSortDirection(request($orderKey));

            $sort = $this->getSort(request($sortKey));

            if (empty($sort)) return $builder;

            return $builder->orderBy($sort, $direction);
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    protected function getSort($field)
    {
        try {
            return $this->sorts[$field] ?? '';
        } catch (\Exception $ex) {
            return '';
        }
    }

    protected function getSortDirection($direction): string
    {
        try {
            return strtolower($direction) === 'desc' ? 'desc' : 'asc';
        } catch (\Exception $ex) {
            return 'asc';
        }
    }
}
