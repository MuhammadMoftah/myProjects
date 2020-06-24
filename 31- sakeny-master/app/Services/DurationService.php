<?php

namespace App\Services;

use App\Repositories\Duration\DurationRepositoryInterface;
use Illuminate\Http\Request;

class DurationService
{
    private $duration;
    private $request;

    public function __construct(DurationRepositoryInterface $duration, Request $request)
    {
        $this->duration = $duration;
        $this->request = $request;
    }

    public function getAll()
    {
        return $this->duration->getAll();
    }

    public function create()
    {
        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'duration' => request('duration'),
        ];
        $this->duration->create($data);
    }

    public function getSingle($id)
    {
        return $this->duration->getById($id);
    }

    public function update($id)
    {
        $duration = $this->getSingle($id);

        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'duration' => request('duration'),
        ];

        $this->duration->update($id, $data);
    }
}
