<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\Package\SubscribeRequest;
use App\Models\ContactUs;
use Mail;
use App\Mail\ContactUsMail;
use App\Services\PackageService;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function userSubscribe(SubscribeRequest $request, PackageService $packageService)
    {
        $user = auth('user')->user();
        if ($user->activesubscription) {
            return back()->withErrors(trans('lang.you_already_subscribe'));
        }

        $package = $packageService->getSingle(request('package_id'));
        $this->subscriptionService->subscribe($package, $user->id, 'user');
        return back()->withMessage('user subscribed Successfully');
    }
}
