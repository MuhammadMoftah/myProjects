<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\Mall;

class MallService
{
    private $mall_model;
    private $request;

    public function __construct(Mall $mall_model, Request $request)
    {
        $this->mall_model = $mall_model;
        $this->request = $request;
    }

    public function getSingleMall($id)
    {
        return $this->mall_model->findOrFail($id);
    }

    public function getAllMalls()
    {
        $malls = $this->mall_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $malls->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $malls = $malls->active()->latest()->paginate(16);

        return $malls;
    }
}
