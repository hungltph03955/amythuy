<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailRepositoryInterface;

class OrderDetailController extends Controller
{
    protected $orderDetailRepository;
    public function __construct(OrderDetailRepositoryInterface $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $orderDetails = $this->orderDetailRepository->gets();
        return view('admin.order_detail.index',
            [
                'orderDetails' => $orderDetails
            ]);
    }
}
