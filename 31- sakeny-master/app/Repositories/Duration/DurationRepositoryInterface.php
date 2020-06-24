<?php

namespace App\Repositories\Duration;

interface DurationRepositoryInterface
{
    public function getAll(array $columns = [], int $paginate = 0);
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
}
