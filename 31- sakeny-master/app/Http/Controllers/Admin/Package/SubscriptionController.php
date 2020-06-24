<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function getAll()
    {
        $subscriptions = $this->subscriptionService->getAll();
        return view('admin.package.subscription.index', compact('subscriptions'));
    }

    public function getSingle($id)
    {
        $subscription = $this->subscriptionService->getSingle($id);
        return view('admin.package.subscription.view', compact('subscription'));
    }

    public function approve($id)
    {
        $this->subscriptionService->changeApprove($id);
        return redirect()->route('admin.subscriptions.all')->withMessage('Subscription Approve Status Changed');
    }

    public function active($id)
    {
        $this->subscriptionService->activeToggle($id);
        return redirect()->route('admin.subscriptions.all')->withMessage('Subscription Activation Status Changed');
    }
}
