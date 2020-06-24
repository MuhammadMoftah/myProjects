<?php namespace App\Http\Controllers\Admin\Development\Permission;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoreController;
use Illuminate\Http\Request;
use App\Models\Development\Permission\ProtectedUrl;

class ProtectedUrlController extends CoreController
{
    function __construct(ProtectedUrl $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','title','Module');
        $this->show_columns_select = array('id','title','module_id');
        parent::__construct();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $row = $this->model->findOrFail($id);
        $main_column = $this->main_column;
        $this->pushBreadcrumb(array($row->$main_column));
        $actions_lists = ProtectedUrl::where('module_id',$id)->pluck('title','id')->toArray();

        return $this->view('edit',array(
                'row'=>$row,
                'inputs'=>$this->inputs(),
                'breadcrumb'=>$this->breadcrumb,
                'actions_lists'=>$actions_lists,
                ));
    }


    /**
     * Form Builder
     * @return Array
     */
    public function formBuilder()
    {
        $this->formInput =
        [
            [
                'name'=>'title',
                'label'=>trans('lang.title'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'title',
                    'class'=>'form-control'
                ]
            ],
            [
                'name'=>'action',
                'label'=>trans('action'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'action',
                    'class'=>'form-control'
                ]
            ],
            [
                'name'=>'exception',
                'type'=>'hidden',
                'value'=>1,
                'options'=>
                [
                    'id'=>'exception',
                    'class'=>'form-control'
                ]
            ],


        ];


         $this->formInput_update =
        [
            [
                'name'=>'title',
                'label'=>trans('lang.title'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'title',
                    'class'=>'form-control'
                ]
            ],
            [
                'name'=>'action',
                'label'=>trans('action'),
                'type'=>'text',
                'value'=>null,
                'options'=>
                [
                    'id'=>'action',
                    'class'=>'form-control'
                ]
            ],

            [
                'name'=>'method',
                'label'=>trans('method'),
                'type'=>'select',
                'select_options'=>['GET'=>'GET','POST'=>'POST','PUT'=>'PUT','PATCH'=>'PATCH','DELETE'=>'DELETE'],
                'value'=>null,
                'options'=>
                [
                    'id'=>'method',
                    'class'=>'form-control'
                ]
            ],

            [
                'name'=>'element',
                'label'=>trans('element'),
                'type'=>'select',
                'select_options'=>['a'=>'a','form'=>'form','button'=>'button'],
                'value'=>null,
                'options'=>
                [
                    'id'=>'element',
                    'class'=>'form-control'
                ]
            ],
            [
                'name'=>'status',
                'label'=>trans('status'),
                'type'=>'select',
                'select_options'=>[1=>'Active', 0=>'Deactive'],
                'value'=>null,
                'options'=>
                [
                    'id'=>'status',
                    'class'=>'form-control'
                ]
            ],





        ];
    }


    public function onIndex()
    {
        $escape_columns = ['module_id'];

        $this->custom_columns = [
            [
                'name'=>'module_id',
                'value'=> function($row){
                    if ($row->module)
                        return "<a href='".url(ADMIN_PATH."/development/permission/module/$row->module_id/edit")."'>".$row->module->title."</a>";
                    return 'Unlinked';
                }
            ]
        ];
    }

     /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title' => 'required|max:255',
            'action' => 'required|max:255',
        ]);
    }

    public function isStored($row)
    {
        /*foreach (request()->action['title'] as $key => $action) {
            $insert = $row->urls()->create(array(
                                       'title'=>request()->action['title'][$key],
                                       'action'=>request()->action['action'][$key],
                                        'method'=>request()->action['method'][$key],
                                        'element'=>request()->action['element'][$key],
                                        'status'=>request()->action['status'][$key],
                                        'linked_to'=>request()->action['linked_to'][$key] == '1' ? @$insert->id : ''
            ));
        }*/

    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'title' => 'required|max:255'
        ]);
    }


    public function isUpdated($row)
    {
        foreach (request()->action['id'] as $key => $action) {
            $row->actions()->find(request()->action['id'][$key])
                            ->update(array(
                                   'title'=>request()->action['title'][$key],
                                   'action'=>request()->action['action'][$key],
                                    'method'=>request()->action['method'][$key],
                                    'element'=>request()->action['element'][$key],
                                    'status'=>request()->action['status'][$key],
                                    'linked_to'=>@request()->action['linked_to'][$key]
                            ));
        }
    }

}
