<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Package\SubscribeRequest;
use App\Services\PackageService;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function companySubscribe(SubscribeRequest $request, PackageService $packageService)
    {
        $user = auth('user')->user();
        $company = $user->company;
        if ($company->activesubscription) {
            return back()->withErrors(trans('lang.you_already_subscribe'));
        }
        $package = $packageService->getSingle(request('package_id'));
        $this->subscriptionService->subscribe($package, $company->id, 'company');
        return back()->withMessage('Company Subscribed Successfully');
    }
}
