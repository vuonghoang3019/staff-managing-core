<?php

namespace Admin\Repos\Traits;

use Illuminate\Database\Eloquent\Builder;
use Admin\Configs\Config;

trait WhereDate
{
    private function validWhereOperation($operator): bool
    {
        return in_array($operator, ['<', '<=', '>', '>=']);
    }

    public function filterWhereDate(Builder $builder, string $keyword, $columns, $operator = '>=', $bool = false): Builder
    {
        if (!$this->validWhereOperation($operator)) return $builder;

        $date = convert_to_date($keyword, Config::DATE_DEFAULT);

        return $this->createWhereDateQuery($builder, $columns, $operator, $date, $bool);
    }

    public function filterWhereDatetime(Builder $builder, string $keyword, $columns, $operator = '>=', $bool = false): Builder
    {
        if (!$this->validWhereOperation($operator)) return $builder;

        $append = '';

        if (strlen(request($keyword)) <= 10) $append = in_array($operator, ['<', '<=']) ? '23:59:59' : '00:00:00';

        $date = convert_to_date($keyword, Config::DATETIME_FULL, $append);

        return $this->createWhereDateQuery($builder, $columns, $operator, $date, $bool);
    }

    protected function createWhereDateQuery(Builder $builder, $columns, $operator, $date, $bool = false): Builder
    {
        if (empty($date)) return $builder;

        if (is_string($columns)) return $builder->where($columns, $operator, $date);

        if (!is_array($columns)) return $builder;

        return $builder->where(function (Builder $b) use ($columns, $operator, $date, $bool) {
            foreach (array_values($columns) as $key => $col) {
                if ($key == 0) {
                    $b = $b->where($col, $operator, $date);
                } else {
                    $b = $bool ? $b->where($col, $operator, $date) : $b->orWhere($col, $operator, $date);
                }
            }

            return $b;
        });
    }
}
