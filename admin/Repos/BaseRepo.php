<?php

namespace Admin\Repos;

use Admin\Responses\Response;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
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
    protected string $responseList, $responseSingle;
    protected Response $response;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->response = new Response();
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

    public function baseIndex($data): JsonResponse
    {
        try {
            if (request()->has('search')) return $this->response->success([$this->responseList => $data]);

            $response = array_merge([$this->responseList => $data], $this->response());

            return $this->response->success($response);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseCreate(array $response = []): JsonResponse
    {
        try {
            return $this->response->success($this->response());
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseStore(array $data): JsonResponse
    {
        try {
            $store = $this->create($data);

            return $this->response->success([
                $this->responseSingle => $store,
                'Message'             => __("Support.Operation was successful"),
            ]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseEdit(): JsonResponse
    {
        try {
            $response = array_merge([$this->responseSingle => request($this->responseSingle)], $this->response());

            return $this->response->success($response);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseUpdate(array $data, string $id): JsonResponse
    {
        try {
            $response = $this->update($data, $id);
//           Resource api


            return $this->response->success([
                $this->responseSingle => $response,
                'Message'             => __("Support.Operation was successful")
            ]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseDestroy($ids): JsonResponse
    {
        try {
            $ids = explode(Config::COMMA, $ids);

            if (count($ids) <= 0) return $this->response->badRequest(__("Support.No element was selected"));

            $this->softDelete($ids);

            return $this->response->success(['Message' => __("Support.Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function baseDelete($ids): JsonResponse
    {
        try {
            $ids = explode(Config::COMMA, $ids);

            if (count($ids) <= 0) return $this->response->badRequest(__("Support.No element was selected"));

            $this->destroy($ids);

            return $this->response->success(['Message' => __("Support.Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    protected function response(): array
    {
        return [];
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
        dd($this->$id);
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
