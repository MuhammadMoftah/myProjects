<?php

namespace App\Services;

use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubscriptionService
{
    private $subscription;
    private $request;

    public function __construct(SubscriptionRepositoryInterface $subscription, Request $request)
    {
        $this->subscription = $subscription;
        $this->request = $request;
    }

    public function subscribe($package, $subscriberId, $type)
    {

        $packageDuration = $package->durationtype->duration->duration;

        $subscriptionData = [
            'package_id' => $package->id,
            'no_of_seo_ads' => $package->adtype->no_of_seo_ads,
            'no_of_normal_ads' => $package->adtype->no_of_normal_ads,
            'no_of_special_ads' => $package->adtype->no_of_special_ads,
            'no_of_repeated_ads' => $package->adtype->no_of_repeated_ads,
            'package' => $package,
            'start_date' => Carbon::now()->toDateTimeString(),
            'end_date' => Carbon::now()->addMonths($packageDuration)->toDateTimeString()
        ];

        $type == 'user' ? $subscriptionData['user_id'] = $subscriberId : $subscriptionData['company_id'] = $subscriberId;

        $this->subscription->create($subscriptionData);
        return true;
    }

    public function hasSubscribe($type, $subscriberId)
    {
        $type == 'user' ? $getData['user_id'] = $subscriberId : $getData['company_id'] = $subscriberId;
        $subscriptions = $this->subscription->getAll($getData);

        if (count($subscriptions) > 0) {
            return true;
        }

        return false;
    }

    public function getAll()
    {
        $searchData = [];

        if (isset(request()->status)) {
            $searchData['approve'] = request('status');
        }

        return $this->subscription->getAll($searchData, 15);
    }

    public function getSingle($id)
    {
        return $this->subscription->getSingleBy(['id' => $id]);
    }

    public function changeApprove($id)
    {
        $subscription = $this->getSingle($id);
        $packageDuration = $subscription->packageObj->durationtype->duration->duration;
        $data['approve'] = $subscription->approve == 1 ? 0 : 1;

        if ($data['approve'] == 1) {
            $data['start_date'] = Carbon::now()->toDateTimeString();
            $data['end_date'] = Carbon::now()->addMonths($packageDuration)->toDateTimeString();
        }

        $this->subscription->update($id, $data);
    }

    public function activeToggle($id)
    {
        $subscription = $this->getSingle($id);

        if ($subscription->active == 1) {
            $data["deactivate_date"] = Carbon::now()->toDateTimeString();
        }

        $data["active"] = $subscription->active == 1 ? 0 : 1;
        $this->subscription->update($id, $data);
    }
}
