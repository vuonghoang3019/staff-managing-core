<?php

namespace Admin\Repos;

use Admin\Models\About;
use Illuminate\Container\Container as Application;

class AboutRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    public function model(): string
    {
        return About::class;
    }

    public function search()
    {
        $query = $this->baseQuery();

        $query = $query->select(About::$_All);

        return $this->pagination($query);
    }
}
