<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Notification;

class NotificationController extends CoreController
{
    function __construct(Notification $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'name_ar', 'name_en'];
        $this->show_columns_select = ['id', 'name_ar', 'name_en'];

        parent::__construct();
    }

    public function index()
    {
        return redirect('admin/notification/create');
    }



    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title' => 'required|max:255',
            'content'  => 'required',
        ]);
    }

    public function store()
    {
        $insert = Notification::create([
            'data'=>request(['title', 'message'])
        ]);
        $this->ifMethodExistCallIt('isStored', $insert);
        return redirect("admin/notification/create")->with('success','Notification sent to all user successfully');
    }

}
