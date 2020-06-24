<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permission\Role;
use App\Models\Permission\Module;
use App\Models\Permission\ProtectedUrl;

class RoleController extends CoreController
{
    function __construct(Role $model)
    {
        $this->model = $model;
        $this->show_columns_html = array('id','title');
        $this->show_columns_select = array('id','title');
        $modules = Module::all();
        view()->share(compact('modules'));
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
        return $this->returnMessage($insert,1);
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title' => 'required|max:255',
            'url_id'=>'min:1',
            'module_id'=>'min:1',
        // module_id
        ]);
    }



    public function isStored($row)
    {
        if (request('url_id') != null ){
           $linkedUrls = ProtectedUrl::whereIn('linked_to',request('url_id'))
                                ->pluck('id')->all();
            if (request('url_id')) {
                $urls = array_merge($linkedUrls,request('url_id'));
                $row->url()->attach($urls);
            }
            $row->modules()->attach(request('module_id'));
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if ($id == 1) {
            if (auth()->guard('admin')->user()->role_id != 1) {
                abort(403);
            }
        }
        $this->ifMethodExistCallIt('onEdit');
        $row = $this->model->findOrFail($id);
        $main_column = $this->main_column;
        $this->pushBreadcrumb(array($row->$main_column));
        return $this->view('edit',array(
            'row'=>$row,
            'inputs'=>$this->inputs(),
            'breadcrumb'=>$this->breadcrumb
        ));
    }


    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'title' => 'required|max:255',
        ]);
    }


    public function isUpdated($row)
    {
        if ($this->request->url_id != null ){
            $protected_urls = ProtectedUrl::whereIn('linked_to',$this->request->url_id)->get();
            $urls = array();

            foreach ($protected_urls as $key => $url) {
                $urls[] = $url->id;
            }

            $urls = array_merge($urls,$this->request->url_id);

            $row->url()->sync($urls);
            $row->modules()->sync($this->request->module_id);
        }
    }


}
