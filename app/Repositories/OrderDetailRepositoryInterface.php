<?php

/**
 */

namespace App\Repositories;

interface OrderDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function getDetailOder($orderId);
}
