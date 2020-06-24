<?php

namespace App\Repositories\Subscription;

use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use App\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public $subscriptionModel;

    public function __construct(Subscription $subscriptionModel)
    {
        $this->subscriptionModel = $subscriptionModel;
    }

    public function store()
    {
        $this->subscriptionModel->create([
            'email' => request('email')
        ]);
    }

    public function get($perPage = 10)
    {
        $emails = $this->subscriptionModel->newQuery();

        if (request('keyword')) {
            $emails->where('email', 'LIKE', '%' . request('keyword') . '%');
        }

        return $emails->latest()->paginate($perPage);
    }
}
