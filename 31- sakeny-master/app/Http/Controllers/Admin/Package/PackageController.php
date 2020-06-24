<?php

namespace App\Http\Controllers\Admin\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\package\PackageRequest;
use App\Services\AdTypeService;
use App\Services\DurationService;
use App\Services\DurationTypeService;
use App\Services\PackageService;

class PackageController extends Controller
{
    protected $packageService;

    function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function getAll()
    {
        $packages = $this->packageService->getAll();
        return view('admin.package.package.index', compact('packages'));
    }

    public function getSinglePackage($id)
    {
        $package = $this->packageService->getSingle($id);
        return view('admin.package.package.view', compact('package'));
    }

    public function create(AdTypeService $adTypeService, DurationService $durationService, DurationTypeService $durationTypeService)
    {
        $types = $durationTypeService->getAll();
        $adtypes = $adTypeService->getAll();

        return view("admin.package.package.create", compact("types", "adtypes"));
    }

    public function post(PackageRequest $request)
    {
        $this->packageService->create();
        return redirect()->route('admin.packages.all')->withMessage("Paackage Created Successfully");
    }

    public function delete($id)
    {
        $this->packageService->delete($id);
        return redirect()->route('admin.packages.all')->with('success', "package deleted Successfully");
    }

    public function edit($id, AdTypeService $adTypeService, DurationService $durationService, DurationTypeService $durationTypeService)
    {
        $package = $this->packageService->getSingle($id);
        $types = $durationTypeService->getAll();
        $adtypes = $adTypeService->getAll();

        return view("admin.package.package.edit", compact("package", "types", "adtypes"));
    }

    public function update($id, PackageRequest $request)
    {
        $this->packageService->update($id);
        return redirect()->route('admin.packages.all')->withMessage("Package Updated Successfully");
    }

    public function changeStatus($id)
    {
        $state = $this->packageService->changeStatus($id);
        if ($state) {
            return redirect()->route('admin.packages.all')->withMessage("Package Updated Successfully");
        }
        return redirect()->route('admin.packages.all')->withErrors("You Already Have Free Package");
    }

    public function changeActive($id)
    {
        $this->packageService->changeActive($id);
        return redirect()->route('admin.packages.all')->withMessage("Status Changed Successfully");
    }
}
