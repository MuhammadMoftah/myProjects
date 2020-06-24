<?php

namespace App\Repositories\Subscription;

interface SubscriptionRepositoryInterface
{
    public function create(array $subscriptionData);
    public function getAll(array $columns = [], int $paginate = 0);
    public function getSingleBy(array $columns = []);
    public function update(int $id, array $columns);
}
