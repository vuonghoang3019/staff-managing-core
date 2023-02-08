<?php

namespace Admin\Repos;

use Admin\Http\Resources\BaseCollection;
use Admin\Models\Post;
use Illuminate\Container\Container as Application;
use Admin\General\Post as PostConfig;

class PostRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->responseSingle = PostConfig::NAME;
        $this->responseList = PostConfig::LIST;
    }

    public function model(): string
    {
        return Post::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Post::$_All);

        $response = new BaseCollection($this->pagination($query));

        return $this->baseIndex($this->pagination($query));
    }
}
