<?php

namespace Admin\Services;

use Admin\Configs\Config;
use Illuminate\Http\JsonResponse;
use Admin\Responses\Response;

class BaseService
{
    protected Response $response;
    protected $baseRepo;
    protected string $responseList, $responseSingle;

    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * @return JsonResponse
     */
    public function baseIndex(): JsonResponse
    {
        try {
            if (request()->has('search')) return $this->response->success([$this->responseList => $this->baseRepo->search()]);

            $response = array_merge([$this->responseList => $this->baseRepo->search()], $this->response());

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
            $store = $this->baseRepo->create($data);

            $response = array_merge([$this->responseSingle => $store], $this->response());

            return $this->response->success([
                $this->responseSingle => $response,
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
            $updated = $this->baseRepo->update($data, $id);

            $response = array_merge([$this->responseSingle => $updated], $this->response());

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

            $this->baseRepo->softDelete($ids);

            return $this->response->success(['Message' => __("Support.Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    protected function response(): array
    {
        return [];
    }
}
