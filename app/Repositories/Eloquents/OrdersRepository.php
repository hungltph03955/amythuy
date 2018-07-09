<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Order;
use App\Repositories\OrdersRepositoryInterface;

class OrdersRepository extends BaseRepository implements OrdersRepositoryInterface {

    public function getBlankModel() {
        return new Order();
    }

    public function __construct(Order $order) {
        $this->model = $order;
    }

    public function generateNo() {
        return Order::generateNo();
    }

}
