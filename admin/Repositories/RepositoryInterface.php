<?php

namespace Admin\Repositories;

interface RepositoryInterface
{
    public function list();

    public function detail($id);

    public function create($attribute = []);

    public function update($id ,$attribute = []);

    public function delete($id);

    public function action($id);
}
