<?php

namespace App\Services;

use App\Repositories\DurationType\DurationTypeRepositoryInterface;
use Illuminate\Http\Request;

class DurationTypeService
{
    private $durationTypeType;
    private $request;

    public function __construct(DurationTypeRepositoryInterface $durationType, Request $request)
    {
        $this->durationType = $durationType;
        $this->request = $request;
    }

    public function getAll()
    {
        return $this->durationType->getAll();
    }

    public function create()
    {
        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'duration_id' => request('duration_id'),
        ];
        $this->durationType->create($data);
    }

    public function getSingle($id)
    {
        return $this->durationType->getById($id);
    }

    public function update($id)
    {
        $durationType = $this->getSingle($id);

        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'duration_id' => request('duration_id'),
        ];

        $this->durationType->update($id, $data);
    }
}
