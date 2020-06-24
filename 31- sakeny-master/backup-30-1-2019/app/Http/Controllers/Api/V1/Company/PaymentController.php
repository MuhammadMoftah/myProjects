<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Models\Ads;
use App\Models\Country;
use App\Models\AdsImage;
use App\Models\UnitView;
use App\Models\OfferType;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\CoreController;

class PaymentController extends CoreController
{
    protected function scoper()
    {

        return $this->auth->company->payments();
    }

    public function store()
    {
        $company = $this->auth->company;
        if (request('trial') == true) {
           $company->updateTrial($company->country->number_of_days_for_trial_package);
            $company->increment('number_of_regular_ads', $company->country->number_of_ads_for_trial_package);
            return $this->response(['company'=> $company]);
        }else{
            $this->ifMethodExistCallIt('onStore');
            $row = $this->scoper()->create($this->request->all());
            $this->ifMethodExistCallIt('isStored', $row);
           $row = $this->scoper()->find($row->id);
            return $this->response([
                'data' => $row,
                'message' => 'Added successfully'
            ]);
        }
    }
    public function onStore()
    {
        $this->setCreatableAttibutes($this->request->only('package_id', 'payment_gateway'));
    }

    public function isStored($row)
    {
        $company = $this->auth->company;
        // $company->increment('number_of_premium_ads', $row->package->number_of_premium_ads);
        // $company->increment('number_of_regular_ads', $row->package->number_of_regular_ads);
        // $company->increment('number_of_agents', $row->package->number_of_agents);
    }
}
