<?php

namespace Backend\Repositories;

interface RepositoryInterface
{
    public function getAllList();

    public function getDetail($id);

    public function create($attribute = []);

    public function update($attribute = []);

    public function delete($id);
}
