<?php

namespace App\Repositories\Duration;

use App\Models\Package\Duration;
use App\Repositories\Duration\DurationRepositoryInterface;

class DurationRepository implements DurationRepositoryInterface
{
    private $duration;

    public function __construct(Duration $duration)
    {
        $this->duration = $duration;
    }

    public function getAll(array $columns = [], int $paginate = 0)
    {
        $durations = $this->duration->newQuery();

        foreach ($columns as $key => $value) {
            $durations->where($key, $value);
        }

        $durations->latest();

        $durations = $paginate != 0 ? $durations->paginate($paginate) : $durations->get();

        return $durations;
    }

    public function getById(int $id)
    {
        return $this->duration->findOrFail($id);
    }

    public function create($durationData)
    {
        $this->duration->create($durationData);
    }

    public function update(int $id, array $data)
    {
        $this->duration->where('id', $id)->update($data);
    }
}
