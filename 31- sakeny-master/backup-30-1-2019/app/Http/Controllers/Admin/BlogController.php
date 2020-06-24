<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends CoreController
{
    function __construct(Blog $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar'];
        $this->show_columns_select = ['id', 'title_ar'];

        parent::__construct();
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title_ar' => 'required|max:255',
            'title_en'  => 'required|max:255',
            'content_ar' => 'required',
            'content_en'  => 'required',
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
            'title_ar' => 'required|max:255',
            'title_en'  => 'required|max:255',
            'content_ar' => 'required',
            'content_en'  => 'required',
            'image'  => 'required|image',
        ]);
    }

}
