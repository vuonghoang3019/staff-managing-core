<?php

namespace Admin\Repos\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterWhereIn
{
    protected function filterWhereIn(Builder $builder, string $keyword, $columns): Builder
    {
        try {
            $values = convert_to_array($keyword);

            if (count($values) <= 0) return $builder;

            return $this->createWhereInQuery($builder, $values, $columns);
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function createWhereInQuery(Builder $builder, array $values, $columns): Builder
    {
        try {
            if (is_string($columns) && !empty($columns)) return $builder->whereIn($columns, $values);

            if (!is_array($columns) || count($columns) <= 0) return $builder;

            return $builder->where(function (Builder $b) use ($values, $columns) {
                foreach ($columns as $column) {
                    $b = $b->whereIn($column, $values);
                }

                return $b;
            });
        } catch (\Exception $ex) {
            return $builder;
        }
    }
}
