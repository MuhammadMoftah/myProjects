<?php

namespace App\Repositories\Subscription;

interface SubscriptionRepositoryInterface
{
    public function store();
    public function get(int $perPage = 10);
}
