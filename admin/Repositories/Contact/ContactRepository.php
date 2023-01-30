<?php

namespace admin\Repositories\Contact;

use App\Models\Contact;
use admin\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function getModel()
    {
        return Contact::class;
    }

    public function paginate()
    {
        return $this->model->paginate(5);
    }
}
