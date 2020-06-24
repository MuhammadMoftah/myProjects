<?php

namespace App\Http\Controllers\Admin\Development;

use Illuminate\Http\Request;
use App\Models\Development\Menu;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CoreController;

class MenuController extends CoreController
{
    function __construct(Menu $model)
    {
        $this->model = $model;
        parent::__construct();

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->pushBreadcrumb(array('Index'));

        $rows = $this->model
                    ->Heads()->orderBy('sort', 'asc')
                    ->get();

        return $this->view('index',array(
                                         'rows'=>$rows,
                                         'breadcrumb'=>$this->breadcrumb));
    }

    // App\Http\Controllers\Admin\Development\MenuController::menuList($row)
    public static function menuList($row) {
        if ($row->childs)
        {
            return view('admin.development.menu.list', ['row' => $row]);
        }
        return;
    }


    public function onStore()
    {
       return $this->v([
            'name' => 'required|unique:translation_keys',
        ]);
    }

   public function updateSorting()
    {

    }


}
