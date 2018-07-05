<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 22/02/2018
 * Time: 08:35
 */

namespace App\Repositories\Eloquents;
use App\Models\Admin\Order;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $p=10;

    public function getBlankModel()
    {
        return new Order();
    }

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getSearch($s)
    {
        return $this->model->search($s)
            ->paginate($this->p);
    }
}