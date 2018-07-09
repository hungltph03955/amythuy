<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\OrderDetail;
use App\Repositories\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface {

    protected $p = 10;

    public function getBlankModel() {
        return new OrderDetail();
    }

    public function __construct(OrderDetail $orderDetail) {
        $this->model = $orderDetail;
    }

}
