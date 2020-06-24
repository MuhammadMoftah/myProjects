<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Services\admin\MaterialService;
use App\Material;
use Illuminate\Http\Request;
class MaterialController extends Controller
{

    protected $request;
    protected $material_service;
    protected $materials_model;

    public function __construct(MaterialService $material_service,Material $materials_model)
    {
        $this->middleware('permission:material-list', ['only' => ['getAllMaterials', 'getSingleMaterial']]);
        $this->middleware('permission:material-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:material-edit', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:material-delete', ['only' => ['delete']]);

        $this->material_service = $material_service;
        $this->materials_model=$materials_model;
    }

    public function getAllMaterials(Request $request)
    {
        $keyword = $request->keyword;
        $materials = $this->materials_model->newQuery();
        if ($request->ajax()) {
            $materials->where(function ($query) use ($keyword) {
                $query->where('name_ar', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
            $materials = $materials->latest()->paginate(10);
            return view('admin.pages.materials.materials_data', compact('materials'))->render();
        }
        $materials = $materials->latest()->paginate(10);
        return view('admin.pages.materials.all', compact('materials'));
    }

    public function getSingleMaterial($id)
    {
        $material = $this->material_service->getSingleMaterial($id);

        return view('admin.pages.materials.view', compact('material'));
    }

    public function create()
    {
        return view('admin.pages.materials.create');
    }

    public function store(MaterialRequest $request)
    {
        $this->material_service->storeMaterial();
        return back()->withMessage('Frame material created successfully');
    }

    public function getEdit($id)
    {
        $material = $this->material_service->getSingleMaterial($id);
        return view('admin.pages.materials.edit', compact('material'));
    }

    public function postEdit($id, MaterialRequest $request)
    {
        $this->material_service->updateMaterial($id);
        return redirect()->route('admin.materials.get')->withMessage('Frame material updated successfully');
    }

    public function delete($id)
    {
        $this->material_service->deleteMaterial($id);
        return back()->withMessage('Frame material deleted successfully');
    }
}
