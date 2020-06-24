<?php
namespace App\Http\Controllers\admin;

use App\Nationality;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NationalityController extends Controller
{
    protected $nationality_model;
    protected $request;

    public function __construct(Nationality $nationality_model, Request $request)
    {
        $this->request = $request;
        $this->nationality_model = $nationality_model;
    }

    public function getAll()
    {
        $nationalities = $this->nationality_model->paginate(10);
        return view('admin.pages.nationalities.all', compact('nationalities'));
    }

    public function getCreate()
    {
        return view('admin.pages.nationalities.create');
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->nationality_model->getCreateAndUpdateRules());

        $this->nationality_model->create([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);

        return redirect()->route('admin.nationalities')->withMessage('nationality created successfully!');
    }

    public function delete($id)
    {
        $nationality = $this->nationality_model->findOrFail($id);
        return $nationality->delete() ? back()->withMessage('nationality has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $nationality = $this->nationality_model->findOrFail($id);
        return view('admin.pages.nationalities.view', compact('nationality'));
    }

    public function getEdit($id)
    {
        $nationality = $this->nationality_model->findOrFail($id);
        return view('admin.pages.nationalities.edit', compact('nationality'));
    }

    public function postEdit($id)
    {
        $nationality = $this->nationality_model->findOrFail($id);
        $this->validate($this->request, $this->nationality_model->getCreateAndUpdateRules());
        $nationality->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar
        ]);
        return redirect()->route('admin.nationalities')->withMessage('nationality updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $nationalities = $this->nationality_model->where('name_en', 'LIKE', "%" . $keyword . "%")
            ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->paginate(10);
        return view('admin.pages.nationalities.search', compact('nationalities'));
    }
}
