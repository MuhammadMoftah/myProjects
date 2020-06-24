<?php

namespace App\Http\Controllers\admin;

use App\Package;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $package_model;
    protected $request;

    public function __construct(Package $package_model, Request $request)
    {
        $this->request = $request;
        $this->package_model = $package_model;
    }

    public function getAll()
    {
        $packages = $this->package_model->paginate(10);
        return view('admin.pages.packages.all', compact('packages'));
    }

    // public function getCreate()
    // {
    //     return view('admin.pages.packages.create');
    // }

    // public function postCreate()
    // {
    //     $this->validate($this->request, $this->package_model->getCreateAndUpdateRules());

    //     $this->package_model->create([
    //         'name_en' => $this->request->name_en,
    //         'name_ar' => $this->request->name_ar
    //     ]);

    //     return redirect()->route('admin.packages')->withMessage('package created successfully!');
    // }

    // public function delete($id)
    // {
    //     $package = $this->package_model->findOrFail($id);
    //     return $package->delete() ? back()->withMessage('package has been deleted') : abort(500);
    // }

    public function getView($id)
    {
        $package = $this->package_model->findOrFail($id);
        return view('admin.pages.packages.view', compact('package'));
    }

    public function getEdit($id)
    {
        $package = $this->package_model->findOrFail($id);
        return view('admin.pages.packages.edit', compact('package'));
    }

    public function postEdit($id)
    {
        $package = $this->package_model->findOrFail($id);
        $this->validate($this->request, $this->package_model->getCreateAndUpdateRules());
        $package->update([
            'name_en' => $this->request->name_en,
            'name_ar' => $this->request->name_ar,
            'no_of_posts' => $this->request->no_of_posts,
            'no_of_jobs' => $this->request->no_of_jobs,
            'price' => $this->request->price,
            'feature1_en' => $this->request->feature1_en,
            'feature1_ar' => $this->request->feature1_ar,
            'feature2_en' => $this->request->feature2_en,
            'feature2_ar' => $this->request->feature2_ar,
            'feature3_en' => $this->request->feature3_en,
            'feature3_ar' => $this->request->feature3_ar,
        ]);

        return redirect()->route('admin.packages')->withMessage('package updated successfully!');
    }

    // public function search()
    // {
    //     $keyword = $this->request->search;
    //     $packages = $this->package_model->where('name_en', 'LIKE', "%" . $keyword . "%")
    //         ->orWhere('name_ar', 'LIKE', '%' . $keyword . '%')->paginate(10);
    //     return view('admin.pages.packages.search', compact('packages'));
    // }
}
