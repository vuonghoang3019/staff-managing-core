<?php

namespace Admin\Services;

use Admin\General\About;
use Admin\Repos\AboutRepo;

class AboutService extends BaseService
{
    public function __construct(AboutRepo $repo)
    {
        parent::__construct();

        $this->baseRepo = $repo;
        $this->responseSingle = About::NAME;
        $this->responseList = About::LIST;
    }
}
