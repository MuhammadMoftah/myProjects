<?php

namespace App\Services;

use App\Repositories\AdType\AdTypeRepositoryInterface;
use Illuminate\Http\Request;

class AdTypeService
{
    private $ad_type;
    private $request;

    public function __construct(AdTypeRepositoryInterface $ad_type, Request $request)
    {
        $this->ad_type = $ad_type;
        $this->request = $request;
    }

    public function getAll()
    {
        return $this->ad_type->getAll();
    }

    public function create()
    {
        // 
        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'no_of_special_ads' => request('no_of_special_ads'),
            'no_of_repeated_ads' => request('no_of_repeated_ads'),
            'no_of_seo_ads' => request('no_of_seo_ads'),
            'no_of_normal_ads' => request('no_of_normal_ads'),
        ];
        $this->ad_type->create($data);
    }

    public function getSingle($id)
    {
        return $this->ad_type->getById($id);
    }
    public function delete($id)
    {
        $this->ad_type->delete($id);
    }

    public function update($id)
    {
        $ad_type = $this->getSingle($id);

        $data = [
            'name_en' => request('name_en'),
            'name_ar' => request('name_ar'),
            'no_of_special_ads' => request('no_of_special_ads'),
            'no_of_repeated_ads' => request('no_of_repeated_ads'),
            'no_of_seo_ads' => request('no_of_seo_ads'),
            'no_of_normal_ads' => request('no_of_normal_ads'),
        ];

        $this->ad_type->update($id, $data);
    }
}
