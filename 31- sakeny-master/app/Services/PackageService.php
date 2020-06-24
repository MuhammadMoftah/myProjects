<?php

namespace App\Services;

use App\Repositories\Package\PackageRepositoryInterface;
use Illuminate\Http\Request;

class PackageService
{
    private $package;
    private $request;

    public function __construct(PackageRepositoryInterface $package, Request $request)
    {
        $this->package = $package;
        $this->request = $request;
    }

    public function getAll()
    {
        return $this->package->getAll();
    }

    public function getSingle($id)
    {
        return $this->package->getSingleBy(['id' => $id]);
    }

    public function getFreePackage()
    {
        return $this->package->getSingleBy(['free' => 1]);
    }

    public function create()
    {
        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'description_en' => request('description_en'),
            'description_ar' => request('description_ar'),
            'price' => request('price'),
            'duration_type_id' => request('duration_type_id'),
            'ads_type_id' => request('ad_type_id'),
        ];

        $this->package->create($data);
    }

    public function delete($id)
    {
        return $this->package->delete($id);
    }

    public function update($id)
    {
        $package = $this->getSingle($id);

        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'description_en' => request('description_en'),
            'description_ar' => request('description_ar'),
            'price' => request('price'),
            'duration_type_id' => request('duration_type_id'),
            'ads_type_id' => request('ad_type_id'),
        ];

        $this->package->update($id, $data);
    }

    public function changeStatus($id)
    {
        $package = $this->getSingle($id);

        $freePackages = $this->package->getAll(['free' => 1]);

        if (count($freePackages) > 0 && $package->free == 0) {
            return false;
        }

        if ($package->free) {
            $data = ["free" => 0];
        } else {
            $data = ["free" => 1];
        }

        $this->package->update($id, $data);
        return true;
    }

    public function getActivePackages()
    {
        return $this->package->getAll(['active' => 1, 'free' => 0]);
    }

    public function changeActive($id)
    {
        $package = $this->getSingle($id);
        $data["active"] = $package->active == 1 ? 0 : 1;
        $this->package->update($id, $data);
    }
}
