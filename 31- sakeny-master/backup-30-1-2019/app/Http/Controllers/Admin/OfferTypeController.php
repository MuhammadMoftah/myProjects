<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OfferType;

class OfferTypeController extends CoreController
{
    function __construct(OfferType $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar', 'title_en'];
        $this->show_columns_select = ['id', 'title_ar', 'title_en'];

        parent::__construct();
    }

    /**
     * Form Builder
     * @return Array
     */


    public function Activate($id) {
        $row = $this->model->find($id);
        if($row->activation != 1) {
            $update = $this->model->find($id)->update(['activation' => '1']);
            return $this->returnMessage($update, 4);
        }
        else
            $update = $this->model->find($id)->update(['activation' => '0']);
            return $this->returnMessage($update, 5);
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
        ]);
    }

}
