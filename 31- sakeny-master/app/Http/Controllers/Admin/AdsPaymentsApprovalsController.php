<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdsPaymentsApprovals;
use App\Models\Ads;

class AdsPaymentsApprovalsController extends CoreController
{

    function __construct(AdsPaymentsApprovals $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id'];
        $this->show_columns_select = ['id'];
        parent::__construct();
    }

    public function getPremium()
    {
        return $this->getAds(1,'index-premium');
    }

    public function getBumpUp()
    {
        return $this->getAds(0,'index-bump-up');
    }

    public function getAds($type ,$view)
    {
        $this->pushBreadcrumb(array('Index'));
        $this->request->flash();
        $rows = $this->model->where('type',$type)->latest()->get();
        return $this->view($view,array(
            'rows'=>$rows,
            'columns'=>$this->show_columns_html,
            'breadcrumb'=>$this->breadcrumb,
            'select_columns'=>$this->show_columns_select
         ));
    }

    public function acceptPremium($id)
    {
        return $this->accept(1,$id);
    }

    public function acceptBumpUp($id)
    {
        return $this->accept(0,$id);
    }

    public function accept($type = 0 ,$id)
    {
        $row = $this->model->find($id);
        $ad = Ads::find($row->ad_id);
        $ad->renewAd($row->days);

        if ($type == 1)
           $ad->updateAdToPremuim();

        $row->delete();
        $url =  $type == 1 ? "ads-premium" : "ads-bump-up";
        return $this->returnMessage($row, 0, [] , $url);
    }



    public function delete($id,$type)
    {
        $url =  $type == 1 ? "ads-premium" : "ads-bump-up";
        $delete = $this->model->find($id)->delete();
        return $this->returnMessage($delete, 3, [] , $url);
    }
}
