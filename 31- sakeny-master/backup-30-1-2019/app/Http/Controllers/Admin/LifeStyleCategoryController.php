<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LifeStyleCategory;

class LifeStyleCategoryController extends CoreController
{
    function __construct(LifeStyleCategory $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name_ar', 'name_en'];
        $this->show_columns_select = ['id', 'name_ar', 'name_en'];

        parent::__construct();
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name_ar' => 'required|max:255',
            'name_en'  => 'required|max:255',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'name_ar' => 'required|max:255',
            'name_en'  => 'required|max:255',
        ]);
    }

}
