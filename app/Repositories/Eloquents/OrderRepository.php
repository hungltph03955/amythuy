<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Order;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface {

    public function getBlankModel() {
        return new Order();
    }

    public function __construct(Order $order) {
        $this->model = $order;
    }

    public function generateNo() {
        return Order::generateNo();
    }

    public function generateOrderCode($id){
        return sprintf('HD'.date("ymd")."-%'05d", $id);
    }
}
