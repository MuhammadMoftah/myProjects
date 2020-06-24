<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class CurrencyController extends CoreController
{
    function __construct(Currency $model)
    {
        $this->model = $model;
        $this->show_columns = array('name');
        parent::__construct();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->ifMethodExistCallIt('onStore');
        $insert = $this->model->create($this->request->all());
        $this->ifMethodExistCallIt('isStored', $insert);
        return $this->returnMessage($insert,1,['success'=>'added !','failed'=>'failure!']);
    }


    public function formBuilder()
    {
         $this->formInput =
        [
            [
                'name'=>'name',
                'label'=>trans('lang.name'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'name',
                    'class'=>'form-control'
                ]
            ],

        ];
    }


    public function onStore()
    {
       return $this->v([
            'name' => 'required|min:3|unique:currencies',
            ]);
    }

   public function onUpdate()
    {
       return $this->v([
            'name' => 'required|min:3|unique:currencies,name,'.request()->route('currency'),
            ]);
    }

}
