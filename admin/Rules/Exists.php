<?php

namespace Admin\Rules;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Illuminate\Contracts\Validation\Rule;

class Exists implements Rule
{
    /**
     * The model to run the query against.
     *
     * @var Model
     */
    protected Model $model;

    /**
     * The column to check on.
     *
     * @var string
     */
    protected string $column;

    protected array $join = [];

    protected array $where = [];

    /**
     * Create a new rule instance.
     *
     * @param string|Model $model
     * @param string $column
     * @return void
     */
    public function __construct($model, string $column = 'Id')
    {
        if (is_string($model)) {
            $model = app($model);
        }

        if (!($model instanceof Model)) {
            $modelClass = get_class($model);
            throw new InvalidArgumentException("The provided model class {$modelClass} is not an eloquent model.");
        }

        $this->model = $model->newQuery();
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $model = $this->model;

        $model = $this->formatWhere($model);

        $model = $this->formatJoin($model);

        return $model->where($this->column, $value)->exists();
    }

    public function join($model, $first, $second = null, $type = null): Exists
    {
        $this->join[] = [$model, $first, $second, $type];

        return $this;
    }

    public function leftJoin($model, $first, $second = null, string $type = 'leftJoin'): Exists
    {
        return $this->join($model, $first, $second, $type);
    }

    public function where($column, $value, string $type = 'where'): Exists
    {
        $this->where[] = [$column, $value, $type];

        return $this;
    }

    public function whereIn($column, array $value): Exists
    {
        return $this->where($column, $value, 'whereIn');
    }

    public function whereNotIn($column, array $value): Exists
    {
        return $this->where($column, $value, 'whereNotIn');
    }

    public function orWhere($column, $value): Exists
    {
        return $this->where($column, $value, 'orWhere');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __("Common.Exists");
    }

    /**
     * @param Model|Builder $model
     * @return Model|Builder
     */
    public function formatWhere($model)
    {
        if (empty($this->where)) return $model;

        foreach ($this->where as $where) {
            list($column, $val, $type) = $where;

            $method = $type ?? 'where';

            $model = ($column instanceof Closure) ? $model->$method($column) : $model->$method($column, $val);
        }

        return $model;
    }

    /**
     * @param Model|Builder $model
     * @return Model|Builder
     */
    public function formatJoin($model)
    {
        if (empty($this->join)) return $model;

        foreach ($this->join as $join) {
            list($table, $first, $second, $type) = $join;

            $method = $type ?? 'join';

            $model = ($first instanceof Closure) ? $model->$method($table, $first) : $model->$method($table, $first, $second);
        }

        return $model;
    }
}
