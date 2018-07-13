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

    public function changeStatus($id, $status)
    {
        if (!isset($id) && !isset($status)) {
            return redirect()->back()->with('mess', 'Đơn hàng này ko tồn tại');
        }

        $orders = $this->orderRepository->show($id);

        if (!isset($orders)) {
            return redirect()->back()->with('mess', 'Đơn hàng này ko tồn tại');
        }
        $data = $status;
        $update = $this->orderRepository->updateStatus($data, $id);

        if ($update == false) {
            return redirect()->back()->with('mess', 'Đơn hàng này ko tồn tại');
        } else {
            return redirect()->action('Admin\OrderDetailController@show', $orders->id)->with('mess', 'Chuyển đổi trạng thái đơn hàng thành công');
        }
    }
}
