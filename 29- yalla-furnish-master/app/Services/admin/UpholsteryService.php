<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Upholstery;

class UpholsteryService
{
    private $upholstery_model;
    private $request;

    public function __construct(Upholstery $upholstery_model, Request $request)
    {
        $this->upholstery_model = $upholstery_model;
        $this->request = $request;
    }

    public function getAllUpholsteries()
    {
        return $this->upholstery_model->latest()->paginate(10);
    }

    public function getSingleUpholstery($id)
    {
        return $this->upholstery_model->findOrFail($id);
    }

    public function storeUpholstery()
    {
        $this->upholstery_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function updateUpholstery($id)
    {
        $upholstery = $this->getSingleUpholstery($id);

        $upholstery->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function deleteUpholstery($id)
    {
        $upholstery = $this->getSingleUpholstery($id);
        $upholstery->delete();
    }
}
