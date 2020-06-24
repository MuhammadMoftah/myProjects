<?php

namespace App\Repositories\AdType;

use App\Models\Package\AdType;
use App\Repositories\AdType\AdTypeRepositoryInterface;

class AdTypeRepository implements AdTypeRepositoryInterface
{
    private $ad_type;

    public function __construct(AdType $ad_type)
    {
        $this->ad_type = $ad_type;
    }

    public function getAll(array $columns = [], int $paginate = 0)
    {
        $ad_type = $this->ad_type->newQuery();

        foreach ($columns as $key => $value) {
            $ad_type->where($key, $value);
        }

        $ad_type->latest();

        $ad_type = $paginate != 0 ? $ad_type->paginate($paginate) : $ad_type->get();

        return $ad_type;
    }

    public function getById(int $id)
    {
        return $this->ad_type->findOrFail($id);
    }

    public function create($ad_typeData)
    {
        // dd(request()->all());
        $this->ad_type->create($ad_typeData);
    }

    public function delete($id)
    {

        $this->ad_type->find($id)->delete();
    }


    public function update(int $id, array $data)
    {
        $this->ad_type->where('id', $id)->update($data);
    }
}
