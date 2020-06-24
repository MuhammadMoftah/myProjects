<?php namespace App\Http\Controllers\Admin\Development\Permission;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoreController;
use Illuminate\Http\Request;
use App\Models\Development\Permission\Module;
use App\Models\Development\Permission\ProtectedUrl;
use Form;

class ModuleController extends CoreController
{
    function __construct(Module $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','title');
        $this->show_columns_select = array('id','title');
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

        ];
    }


     /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title' => 'required|max:255'
        ]);
    }

    public function isStored($row)
    {
        foreach (request()->action['title'] as $key => $action) {
            $insert = $row->urls()->create(array(
                                       'title'=>request()->action['title'][$key],
                                       'action'=>request()->action['action'][$key],
                                        'method'=>request()->action['method'][$key],
                                        'element'=>request()->action['element'][$key],
                                        'status'=>request()->action['status'][$key],
                                        'linked_to'=>request()->action['linked_to'][$key] == '1' ? @$insert->id : ''
            ));
        }

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
            foreach (request()->action['title'] as $key => $action) {
                if (@request()->action['id'][$key] != false)
                {
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
                else
                {
                    $insert = $row->urls()->create(array(
                                               'title'=>request()->action['title'][$key],
                                               'action'=>request()->action['action'][$key],
                                                'method'=>request()->action['method'][$key],
                                                'element'=>request()->action['element'][$key],
                                                'status'=>request()->action['status'][$key],
                                                'linked_to'=>request()->action['linked_to'][$key] == '1' ? @$insert->id : ''
                    ));
                }
            }

        if (@request()->action['id']) {
            /*foreach (request()->action['id'] as $key => $action) {
                $row->actions()->find(request()->action['id'][$key])
                                ->update(array(
                                       'title'=>request()->action['title'][$key],
                                       'action'=>request()->action['action'][$key],
                                        'method'=>request()->action['method'][$key],
                                        'element'=>request()->action['element'][$key],
                                        'status'=>request()->action['status'][$key],
                                        'linked_to'=>@request()->action['linked_to'][$key]
                                ));
            }*/
        }
        else{
            foreach (request()->action['title'] as $key => $action) {
                $insert = $row->urls()->create(array(
                                           'title'=>request()->action['title'][$key],
                                           'action'=>request()->action['action'][$key],
                                            'method'=>request()->action['method'][$key],
                                            'element'=>request()->action['element'][$key],
                                            'status'=>request()->action['status'][$key],
                                            'linked_to'=>request()->action['linked_to'][$key] == '1' ? @$insert->id : ''
                ));
            }
        }
    }

}
