<?php

namespace App\Http\Controllers\admin;

use App\Exports\SubscriptionsExport;
use App\Http\Controllers\Controller;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscriptionController extends Controller
{
    protected $request;
    protected $subscription;

    public function __construct(Request $request, SubscriptionRepositoryInterface $subscription)
    {
        $this->subscription = $subscription;
        $this->request = $request;
    }

    public function get()
    {
        $emails = $this->subscription->get();
        return view('admin.pages.subscriptions.index', compact('emails'));
    }

    public function export()
    {
        $emails = $this->subscription->get($perPage = 0);
        return Excel::download(new SubscriptionsExport($emails), 'subscriptions.xlsx');
    }
}
