<?php

namespace App\Repositories\Package;

use App\Models\Package\Package;
use App\Repositories\Package\PackageRepositoryInterface;

class PackageRepository implements PackageRepositoryInterface
{
    private $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function getAll(array $columns = [], int $paginate = 0)
    {
        $packages = $this->package->newQuery();

        foreach ($columns as $key => $value) {
            $packages->where($key, $value);
        }

        $packages->latest();
        $packages = $paginate != 0 ? $packages->paginate($paginate) : $packages->get();
        return $packages;
    }

    public function getSingleBy(array $columns = [])
    {
        $package = $this->package->newQuery();

        foreach ($columns as $key => $value) {
            $package->where($key, $value);
        }
        $package = $package->firstOrFail();

        return $package;
    }

    public function create($packageData)
    {
        $this->package->create($packageData);
    }

    public function delete(int $id)
    {
        return $this->package->findOrFail($id)->delete();
    }

    public function update(int $id, array $data)
    {
        $this->package->where('id', $id)->update($data);
    }
}
