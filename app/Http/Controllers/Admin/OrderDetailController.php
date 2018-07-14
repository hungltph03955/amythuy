<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailRepositoryInterface;
use App\Repositories\SizeRepositoryInterface;
use App\Repositories\ColorRepositoryInterface;
use App\Repositories\MaterialRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;

class OrderDetailController extends Controller
{
    protected $orderDetailRepository;
    protected $sizeRepository;
    protected $colorRepository;
    protected $materialRepository;
    protected $orderRepository;

    public function __construct(
        OrderDetailRepositoryInterface $orderDetailRepository,
        SizeRepositoryInterface $sizeRepository,
        ColorRepositoryInterface $colorRepository,
        OrderRepositoryInterface $orderRepository,
        MaterialRepositoryInterface $materialRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
        $this->sizeRepository = $sizeRepository;
        $this->colorRepository = $colorRepository;
        $this->materialRepository = $materialRepository;
        $this->orderRepository = $orderRepository;
    }

    public
    function show($orderId)
    {

        $order = $this->orderRepository->show($orderId);
        $orderDetails = $this->orderDetailRepository->getDetailOder($orderId);
        if (!isset($orderDetails)) {
            return redirect()->back()->with('mess', 'Đơn hàng này không tồn tại');
        }
        $arrayProductOrder = json_decode($orderDetails['options'], true);

        $arrayProductOrderHaveName = [];
        foreach ($arrayProductOrder as $key => $arrayProductOrderItem) {
            if (isset($arrayProductOrderItem['options'])) {
                if (isset($arrayProductOrderItem['options']['size'])) {
                    $arrayProductOrderItem['options']['sizeName'] = $this->sizeRepository->getSizeName($arrayProductOrderItem['options']['size']);
                }
                if (isset($arrayProductOrderItem['options']['color'])) {
                    $arrayProductOrderItem['options']['colorName'] = $this->colorRepository->getColorName($arrayProductOrderItem['options']['color']);
                }
                if (isset($arrayProductOrderItem['options']['material'])) {
                    $arrayProductOrderItem['options']['materialName'] = $this->materialRepository->getMaterialName($arrayProductOrderItem['options']['material']);
                }
            }
            array_push($arrayProductOrderHaveName, $arrayProductOrderItem);
        }

        $arraStatusOrder = ORDER_STATUS;
        return view('admin.order_detail.index',
            [
                'orderDetails' => $orderDetails,
                'arraStatusOrder' => $arraStatusOrder,
                'order' => $order,
                'arrayProductOrderHaveName' => $arrayProductOrderHaveName
            ]);
    }

    public
    static function getNameColor($idColor)
    {

    }

}
