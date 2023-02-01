<?php

namespace Admin\Repos\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterLike
{
    /**
     * @param Builder $builder
     * @param string $keyword
     * @param mixed $columns
     * @return Builder
     */
    protected function filterLike(Builder $builder, string $keyword, $columns): Builder
    {
        try {
            $value = convert_to_string($keyword);

            if (empty($value)) return $builder;

            return $this->createLikeQuery($builder, $columns, $value);
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function createLikeQuery(Builder $builder, $columns, string $value): Builder
    {
        try {
            if (is_string($columns)) return $this->createQuery($builder, 0, $columns, $value);

            if (!is_array($columns)) return $builder;

            return $builder->where(function (Builder $b) use ($value, $columns) {
                foreach ($columns as $key => $column) {
                    $b = $this->createQuery($b, $key, $column, $value);
                }

                return $b;
            });

        } catch (\Exception $ex) {
            return $builder;
        }
    }

    protected function filterLikeValues(Builder $builder, string $keyword, ?string $column = ''): Builder
    {
        try {
            $values = convert_to_array($keyword);

            if (empty($column) || count($values) <= 0) return $builder;

            return $this->createLikeValuesQuery($builder, $values, $column);
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function createLikeValuesQuery(Builder $builder, array $values, string $column): Builder
    {
        try {
            return $builder->where(function (Builder $b) use ($values, $column) {
                foreach ($values as $key => $value) {
                    $b = $this->createQuery($b, $key, $column, $value);
                }
                return $b;
            });
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function createQuery(Builder $builder, int $key, string $column, $value): Builder
    {
        if ($key > 0) {
            $builder = $builder->orWhere($column, 'LIKE', "%$value%");
        } else {
            $builder = $builder->where($column, 'LIKE', "%$value%");
        }

        return $builder;
    }
}
