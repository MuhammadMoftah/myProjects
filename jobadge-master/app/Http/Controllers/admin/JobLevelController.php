<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\JobLevel;

class JobLevelController extends Controller
{
    protected $joblevel_model;
    protected $request;

    public function __construct(joblevel $joblevel_model, Request $request)
    {
        $this->request = $request;
        $this->joblevel_model = $joblevel_model;
    }

    public function getAll()
    {
        $joblevels = $this->joblevel_model->latest()->paginate(10);
        return view('admin.pages.joblevels.all', compact('joblevels'));
    }

    public function getCreate()
    {
        return view('admin.pages.joblevels.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->joblevel_model->getCreateAndUpdateRules());

        $this->joblevel_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_slug(str_replace('/', ' ', $this->request->name_en))
        ]);

        return redirect()->route('admin.joblevels')->withMessage('joblevel created successfully!');
    }

    public function delete($id)
    {
        $joblevel = $this->joblevel_model->findOrFail($id);
        return $joblevel->delete() ? back()->withMessage('joblevel has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $joblevel = $this->joblevel_model->findOrFail($id);
        return view('admin.pages.joblevels.view', compact('joblevel'));
    }

    public function getEdit($id)
    {
        $joblevel = $this->joblevel_model->findOrFail($id);
        return view('admin.pages.joblevels.edit', compact('joblevel'));
    }

    public function postEdit($id)
    {
        $joblevel = $this->joblevel_model->findOrFail($id);
        $this->validate($this->request, $this->joblevel_model->getCreateAndUpdateRules());
        $joblevel->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'slug' => str_replace('/', '', $this->request->slug)
        ]);
        return redirect()->route('admin.joblevels')->withMessage('joblevel updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $joblevels = $this->joblevel_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->latest()->paginate(10);
        return view('admin.pages.joblevels.search', compact('joblevels'));
    }
}
