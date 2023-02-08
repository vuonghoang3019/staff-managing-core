<?php

namespace Admin\Repos;

use Admin\Http\Resources\Grade\GradeCollection;
use Admin\Models\Grade;
use Illuminate\Container\Container as Application;
use Admin\General\Grade as GradeConfig;

class GradeRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->responseSingle = GradeConfig::NAME;
        $this->responseList = GradeConfig::LIST;
    }

    public function model(): string
    {
        return Grade::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Grade::$_All);

        $response = new GradeCollection($this->pagination($query));

        return $this->baseIndex($this->pagination($query));
    }
}
