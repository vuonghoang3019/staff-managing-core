<?php

namespace Admin\Services;

use Admin\General\Contact;
use Admin\Http\Requests\Contact\BaseRequest;
use Admin\Repos\ContactRepo;

class ContactService extends BaseService
{
    public function __construct(ContactRepo $repo)
    {
        parent::__construct();

        $this->baseRepo = $repo;
        $this->responseSingle = Contact::NAME;
        $this->responseList = Contact::LIST;
    }
}
