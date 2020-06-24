<?php

namespace App\Repositories\Package;

interface PackageRepositoryInterface
{
    public function getAll(array $columns = [], int $paginate = 0);
    public function getSingleBy(array $columns = []);
    public function create(array $data);
    public function delete(int $id);
    public function update(int $id, array $data);
}
