<?php

namespace App\Services\admin;

use Illuminate\Http\Request;
use App\Material;

class MaterialService
{
    private $material_model;
    private $request;

    public function __construct(Material $material_model, Request $request)
    {
        $this->material_model = $material_model;
        $this->request = $request;
    }

    public function getAllMaterials()
    {
        return $this->material_model->latest()->paginate(10);
    }

    public function getSingleMaterial($id)
    {
        return $this->material_model->findOrFail($id);
    }

    public function storeMaterial()
    {
        $this->material_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function updateMaterial($id)
    {
        $material = $this->getSingleMaterial($id);

        $material->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
    }

    public function deleteMaterial($id)
    {
        $material = $this->getSingleMaterial($id);
        $material->delete();
    }
}
