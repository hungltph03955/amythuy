<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepositoryInterface;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $orders = $this->orderRepository->getSearch($search);
        return view('admin.order.index',
            [
                'search' => $search,
                'orders' => $orders
            ]);
    }
}
