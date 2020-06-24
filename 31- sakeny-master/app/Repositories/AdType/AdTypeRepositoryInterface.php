<?php

namespace App\Repositories\AdType;

interface AdTypeRepositoryInterface
{
    public function getAll(array $columns = [], int $paginate = 0);
    public function getById(int $id);
    public function create(array $data);
    public function delete(int $id);
}
