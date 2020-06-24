<?php

namespace App\Http\Controllers\Admin\Development\Crud;
//App\Http\Controllers\Admin\Development\Crud\CrudController
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Development\Crud\Crud;
use App\Http\Controllers\Admin\CoreController;

class CrudController extends CoreController
{
    function __construct(Crud $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','name');
        $this->show_columns_select = array('id','name');
        parent::__construct();
    }

    public function onCreate()
    {
        //database
        $data_type_lists = $this->model->getDatabaseDataTypeList();
        $database_attributes = $this->model->getDatabaseAttributes();
        $databsae_table_lists = $this->model->getDatabaseTables();
        $databsae_relations_attributes_lists = $this->model->getDatabaseRelationsAttributes();

        //Form
        $form_input_types = $this->model->getFormInputTypes();
        view()->share(compact('data_type_lists','database_attributes','databsae_table_lists','databsae_relations_attributes_lists','form_input_types'));
    }

     /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'name' => 'required|max:255'
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|max:255'
        ]);
    }

}
