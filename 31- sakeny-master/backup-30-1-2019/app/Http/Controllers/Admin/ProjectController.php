<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\City;
use App\Models\Project;
use App\Models\Developer;
use App\Models\ProjectContact;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\ProjectFeature;
use App\Http\Controllers\Controller;

class ProjectController extends CoreController
{
    function __construct(Project $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'title_ar', 'title_en'];
        $this->show_columns_select = ['id', 'title_ar', 'title_en'];
        $cities = City::pluck('name_en', 'id');

        $developers = Developer::Developer()->pluck('name', 'id');
        $countries_list = Country::where('activation', 1)->pluck('name_en', 'id');
        view()->share(compact('developers','countries_list','cities'));
        parent::__construct();
    }

    public function index()
    {
        $this->pushBreadcrumb(array('Index'));
        $this->ifMethodExistCallIt('onIndex');
        $this->request->flash();
        if(request('developer'))
            $rows = $this->model->where('developer_id',request('developer'))->orderBy($this->orderBy[0],$this->orderBy[1])->get();
        else
            $rows = $this->model->orderBy($this->orderBy[0],$this->orderBy[1])->get();

        return $this->view('index',array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
    }

    public function viewContacts($id) {
        $contacts = ProjectContact::latest()->where('project_id', $id);
        $rows = $contacts->get();
        $contacts->update(["seen" => 0]);
        $project = $this->model->find($id);
        return $this->view('project-contacts',array(
            'rows'=>$rows,
            'project'=>$project,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
        ));
    }


    public function isStored($row)
    {
        // Store product images
        if(request('images')) {
            foreach (request('images') as $key => $image) {
                $row->images()->create([
                    'image' => $image
                ]);
            }
        }
        // Store product features
        if(request('features')) {
            foreach (request('features') as $key => $feature) {
                if (empty($feature)) {
                    continue;
                }
                $row->features()->create([
                    'feature' => $feature
                ]);
            }
        }
    }

    public function isUpdated($row)
    {
        // update product images
        if(request('images')) {
            foreach (request('images') as $key => $image) {
                $row->images()->create([
                    'image' => $image
                ]);
            }
        }
        // update product features
        if(request('features')) {
            foreach (request('features') as $key => $feature) {
                if (empty($feature)) {
                    continue;
                }
                $row->features()->create([
                    'feature' => $feature
                ]);
            }
        }
    }

    public function destroyImage($id)
    {
        ProjectImage::destroy($id);
        return "true";
    }

    public function destroyFeature($id)
    {
        ProjectFeature::destroy($id);
        return "true";
    }

    /**
     * Before go inside @store method
     * @return avoid
     */
    public function onStore()
    {
        return $this->v([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'developer_description_ar' => 'required',
            'developer_description_en' => 'required',
            // 'location' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'developer_id' => 'required',
        ]);
    }

    /**
    * Before go inside @update method
    * @return avoid
    */
   public function onUpdate()
    {
       return $this->v([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'developer_description_ar' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'developer_description_en' => 'required',
            // 'location' => 'required',
        ]);
    }

    public function updateViewInFront($id)
    {
        $row = $this->model->find($id);
        $update = $row->update(['view_in_front' => request('view_in_front')]);
        if(request('view_in_front') == 1)
            return $this->returnMessage($update, 4 ,[],$this->route."?developer=".$row->developer_id);
        return $this->returnMessage($update, 5 ,[],$this->route."?developer=".$row->developer_id);
    }
}
