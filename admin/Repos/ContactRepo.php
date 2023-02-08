<?php

namespace Admin\Repos;

use Admin\Http\Resources\BaseCollection;
use Admin\Models\Contact;
use Illuminate\Container\Container as Application;

class ContactRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    public function model(): string
    {
        return Contact::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Contact::$_All);

        $response = $this->pagination($query);

        return $this->baseIndex(new BaseCollection($response));
    }

    public function edit(array $data, $id)
    {
        return $this->query()->find($id)->update($data);
    }
}
