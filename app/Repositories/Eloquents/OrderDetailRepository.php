<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 22/02/2018
 * Time: 13:58
 */

namespace App\Repositories\Eloquents;
use App\Models\Admin\OrderDetail;
use App\Repositories\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    protected $p=10;
    public function getBlankModel()
    {
        return new OrderDetail();
    }

    public function __construct(OrderDetail $orderDetail)
    {
        $this->model = $orderDetail;
    }
}