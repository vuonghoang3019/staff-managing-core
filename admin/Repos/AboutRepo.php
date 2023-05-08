<?php

namespace Admin\Repos;

use Admin\Http\Resources\About\AboutCollection;
use Admin\Models\About;
use Illuminate\Container\Container as Application;
use Admin\General\About as AboutConfig;
use Illuminate\Http\JsonResponse;

class AboutRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->responseSingle = AboutConfig::NAME;
        $this->responseList = AboutConfig::LIST;
    }

    public function model(): string
    {
        return About::class;
    }

    public function index(): JsonResponse
    {
        $query = $this->baseQuery();

        $query = $query->select(About::$_All);

        $response = new AboutCollection($this->pagination($query));

        return $this->baseIndex($this->pagination($query));
    }
}
