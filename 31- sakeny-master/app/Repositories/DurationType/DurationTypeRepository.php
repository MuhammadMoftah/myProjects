<?php

namespace App\Repositories\DurationType;

use App\Models\Package\DurationType;
use App\Repositories\DurationType\DurationTypeRepositoryInterface;

class DurationTypeRepository implements DurationTypeRepositoryInterface
{
    private $durationType;

    public function __construct(DurationType $durationType)
    {
        $this->durationType = $durationType;
    }

    public function getAll(array $columns = [], int $paginate = 0)
    {
        $durationTypes = $this->durationType->newQuery();

        foreach ($columns as $key => $value) {
            $durations->where($key, $value);
        }

        $durationTypes->latest();

        $durationTypes = $paginate != 0 ? $durationTypes->paginate($paginate) : $durationTypes->get();

        return $durationTypes;
    }

    public function getById(int $id)
    {
        return $this->durationType->findOrFail($id);
    }

    public function create($durationData)
    {
        $this->durationType->create($durationData);
    }

    public function update(int $id, array $data)
    {
        $this->durationType->where('id', $id)->update($data);
    }
}
