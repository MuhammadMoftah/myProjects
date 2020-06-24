<?php

namespace App\Repositories\Subscription;

use App\Models\Package\Package;
use App\Models\Package\Subscription;
use App\Repositories\subscription\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    private $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function create(array $subscriptionData)
    {
        $this->subscription->create($subscriptionData);
    }

    public function getAll(array $columns = [], int $paginate = 0)
    {
        $subscriptions = $this->subscription->newQuery();

        foreach ($columns as $key => $value) {
            $subscriptions->where($key, $value);
        }

        $subscriptions->latest();
        $subscriptions = $paginate != 0 ? $subscriptions->paginate($paginate) : $subscriptions->get();
        return $subscriptions;
    }

    public function getSingleBy(array $columns = [])
    {
        $subscription = $this->subscription->newQuery();

        foreach ($columns as $key => $value) {
            $subscription->where($key, $value);
        }

        $subscription = $subscription->firstOrFail();
        return $subscription;
    }

    public function update(int $id, array $data)
    {
        $this->subscription->where('id', $id)->update($data);
    }
}
