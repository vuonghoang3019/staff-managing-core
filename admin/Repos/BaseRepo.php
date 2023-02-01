<?php

namespace Admin\Repos;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Admin\Configs\Config;
use Admin\Repos\Traits\FilterLike;
use Admin\Repos\Traits\FilterWhereIn;
use Admin\Repos\Traits\Pagination;
use Admin\Repos\Traits\SortBy;
use Admin\Repos\Traits\WhereDate;

class BaseRepo extends BaseRepository
{
    use FilterLike, FilterWhereIn, Pagination, SortBy, WhereDate;

    protected string $deletedColumn = '';

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return "";
    }

    /**
     * new query to database
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * new query to database
     * @param bool $auth
     * @return Builder
     */
    public function baseQuery(bool $auth = false): Builder
    {
        $query = $this->query();

        if (!empty($this->deletedColumn)) $query = $this->whereNotDeleted($query, $this->deletedColumn);

        return $query;
    }

    public function whereNotDeleted(Builder $builder, ?string $column = '', $value = Config::TRUE): Builder
    {
        if (empty($column)) return $builder;

        return $builder->where(function ($q) use ($column, $value) {
            return $q->where($column, '!=', $value)->orWhereNull($column);
        });
    }

    /**
     * insert data into table
     * @param array $data
     * @return bool
     */
    public function insert(array $data = []): bool
    {
        return !(count($data) <= 0) && $this->model->newQuery()->insert($data);
    }

    /**
     * destroy records, deleted records can't recovery
     * @param $ids
     * @param $column
     * @return int
     */
    public function destroy($ids, $column = null): int
    {
        $column = $column ?? $this->model->getKeyName();

        if (empty($column)) return 0;

        if (is_string($ids) && !empty($ids)) return $this->query()->where($column, $ids)->delete();

        if (is_array($ids) && count($ids) > 0) return $this->query()->where($column, $ids)->delete();

        return 0;
    }

    /**
     * * soft delete records, deleted records can recovery
     * @param $ids
     * @param $column
     * @return int
     */
    public function softDelete($ids, $column = null): int
    {
        $column = $column ?? $this->model->getKeyName();

        if (empty($column) || empty($this->deletedColumn)) return 0;

        if (is_string($ids) && !empty($ids)) return $this->query()->where($column, $ids)->update([$this->deletedColumn => Config::TRUE]);

        if (is_array($ids) && count($ids) > 0) return $this->query()->where($column, $ids)->update([$this->deletedColumn => Config::TRUE]);

        return 0;
    }

    public function baseFind($id, $relation = [])
    {
        return $this->baseQuery()->with($relation)->find($id);
    }

    public function deleteByIds(array $ids, string $column = '')
    {
        return $this->query()->whereIn($this->getColumn($column), $ids)->delete();
    }

    public function getByIds(array $ids, string $column = '')
    {
        return $this->baseQuery()->whereIn($this->getColumn($column), $ids)->get();
    }

    protected function getColumn(string $column = ''): string
    {
        return empty($column) ? $this->model->getKeyName() : $column;
    }

    public function whereActiveRecords(Builder $builder, ?string $column = 'Status'): Builder
    {
        return $builder->where($column, Config::ACTIVE);
    }

    public function getAllActive($relation = [])
    {
        $query = $this->baseQuery()->with($relation);

        return $this->whereActiveRecords($query)->get();
    }
}
