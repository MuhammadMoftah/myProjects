<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionRequest;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $request;
    protected $subscription;

    public function __construct(Request $request, SubscriptionRepositoryInterface $subscription)
    {
        $this->subscription = $subscription;
        $this->request = $request;
    }

    public function postSubscribe(SubscriptionRequest $request)
    {
        $this->subscription->store();
        return back()->withMessage('You Subscribed Successfully')->with('subscribe', true);
    }
}
