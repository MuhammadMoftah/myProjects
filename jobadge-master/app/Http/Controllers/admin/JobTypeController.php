<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\JobType;

class JobTypeController extends Controller
{
    protected $jobtype_model;
    protected $request;

    public function __construct(jobtype $jobtype_model, Request $request)
    {
        $this->request = $request;
        $this->jobtype_model = $jobtype_model;
    }

    public function getAll()
    {

        $jobtypes = $this->jobtype_model->latest()->paginate(10);

        return view('admin.pages.jobtypes.all', compact('jobtypes'));
    }

    public function getCreate()
    {
        return view('admin.pages.jobtypes.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->jobtype_model->getCreateAndUpdateRules());

        $this->jobtype_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_slug(str_replace('/', ' ', $this->request->name_en))
        ]);

        return redirect()->route('admin.jobtypes')->withMessage('jobtype created successfully!');
    }

    public function delete($id)
    {
        $jobtype = $this->jobtype_model->findOrFail($id);
        return $jobtype->delete() ? back()->withMessage('jobtype has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $jobtype = $this->jobtype_model->findOrFail($id);
        return view('admin.pages.jobtypes.view', compact('jobtype'));
    }

    public function getEdit($id)
    {
        $jobtype = $this->jobtype_model->findOrFail($id);
        return view('admin.pages.jobtypes.edit', compact('jobtype'));
    }

    public function postEdit($id)
    {
        $jobtype = $this->jobtype_model->findOrFail($id);
        $this->validate($this->request, $this->jobtype_model->getCreateAndUpdateRules());
        $jobtype->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_replace('/', '', $this->request->slug)
        ]);
        return redirect()->route('admin.jobtypes')->withMessage('jobtype updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $jobtypes = $this->jobtype_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.jobtypes.search', compact('jobtypes'));
    }
}
