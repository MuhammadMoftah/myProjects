<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends CoreController
{
    function __construct(Page $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar', 'title_en'];
        $this->show_columns_select = ['id', 'title_ar', 'title_en'];

        $activation = ['1' => __('lang.active'), '0' => __('lang.in-active')];
        view()->share(compact('activation'));
        parent::__construct();
    }
    
    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'url' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'title_en'  => 'required|max:255',
            'content_ar' => 'required|max:255',
            'content_en'  => 'required|max:255',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'url' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'title_en'  => 'required|max:255',
            'content_ar' => 'required|max:255',
            'content_en'  => 'required|max:255',
        ]);
    }

}
