<?php

namespace Admin\Repos\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Admin\Configs\Config;

trait Pagination
{
    protected array $requestKeys = ['keyword', 'status', 'sort', 'order', 'select', 'limit', 'publish'];

    /**
     * pagination default
     * @param Builder  $query
     * @param int $items
     * @return LengthAwarePaginator|Builder[]|Collection
     */
    protected function pagination(Builder $query, int $items = Config::PER_PAGE)
    {
        try {
//            if (empty($limit = request('limit', ''))) return $this->get();
            try {
                $limit = (int)request('limit');
            } catch (\Exception $ex) {
                $limit = 0;
            }

            $items = $limit > 0 ? $limit : Config::PER_PAGE;

        } catch (\Exception $ex) {
            $items = Config::PER_PAGE;
        }

        request()->merge(['limit' => $items]);

        if (request('all')) return $query->get();

        return $query->paginate($items)->appends(request()->only($this->requestKeys));
    }

    protected function addRequestKeys(array $keys = []): array
    {
        if (!is_array($keys) || count($keys) <= 0)  return $this->requestKeys;

        return $this->requestKeys = array_merge($this->requestKeys, $keys);
    }
}
