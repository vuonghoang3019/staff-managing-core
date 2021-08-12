<?php

namespace Backend\Repositories;

use Illuminate\Support\Facades\Log;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function list()
    {
        return $this->model->all();
    }

    public function detail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->findOrFail($id);
        if ($result)
        {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        try
        {
            $this->model->findOrFail($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }
        catch (\Exception $exception)
        {
            Log::error('Message'. $exception->getMessage(). 'Line' .$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }

}
