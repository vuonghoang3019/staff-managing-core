<?php

namespace Backend\Repositories;

interface RepositoryInterface
{
    public function list();

    public function detail($id);

    public function create($attribute = []);

    public function update($id ,$attribute = []);

    public function delete($id);
}
