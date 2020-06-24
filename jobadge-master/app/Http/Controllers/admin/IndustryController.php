<?php
namespace App\Http\Controllers\admin;

use App\Industry;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndustryController extends Controller
{
    protected $industry_model;
    protected $request;

    public function __construct(Industry $industry_model, Request $request)
    {
        $this->request = $request;
        $this->industry_model = $industry_model;
    }

    public function getAll()
    {
        $industries = $this->industry_model->latest()->paginate(10);
        return view('admin.pages.industries.all', compact('industries'));
    }

    public function getCreate()
    {
        return view('admin.pages.industries.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->industry_model->getCreateAndUpdateRules());

        $this->industry_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);

        return redirect()->route('admin.industries')->withMessage('industry created successfully!');
    }

    public function delete($id)
    {
        $industry = $this->industry_model->findOrFail($id);
        return $industry->delete() ? back()->withMessage('industry has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $industry = $this->industry_model->findOrFail($id);
        return view('admin.pages.industries.view', compact('industry'));
    }

    public function getEdit($id)
    {
        $industry = $this->industry_model->findOrFail($id);
        return view('admin.pages.industries.edit', compact('industry'));
    }

    public function postEdit($id)
    {
        $industry = $this->industry_model->findOrFail($id);
        $this->validate($this->request, $this->industry_model->getCreateAndUpdateRules());
        $industry->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
        return redirect()->route('admin.industries')->withMessage('industry updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $industries = $this->industry_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.industries.search', compact('industries'));
    }
}
