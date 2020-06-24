<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LifeStyleCategory;
use App\Models\LifeStyle;

class LifeStyleController extends CoreController
{
    function __construct(LifeStyle $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar', 'title_en'];
        $this->show_columns_select = ['id', 'title_ar', 'title_en'];

        $categories = LifeStyleCategory::pluck('name_en', 'id');
        view()->share(compact('categories'));
        parent::__construct();
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title_ar' => 'required|max:255|min:3',
            'title_en'  => 'required|max:255|min:3',
            'image'  => 'required|image',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'title_ar' => 'required|max:255|min:3',
            'title_en'  => 'required|max:255|min:3',
            'image'  => 'image',
        ]);
    }

}
