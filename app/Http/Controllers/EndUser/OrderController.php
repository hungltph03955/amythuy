<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\OrdersRepositoryInterface;
use Session;

class OrderController extends Controller
{
    protected $categoryRepository;
    protected $userRepository;
    protected $orderRepository;

    public function __construct(
        CategoriesRepositoryInterface $categoryRepository,
        UserRepositoryInterface $userRepository,
        OrdersRepositoryInterface $orderRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    public function checkout()
    {
        //
        $cates = $this->categoryRepository->gets();
        // dd(\Auth::guard('admin')->user());
        return view('endUser.order.checkout', compact('cates'));
    }

    public function store(Request $request)
    {
        //

        if (!\Auth::check()) {

            $data = $request->all();
            unset($data['_token']);

            $user = $this->userRepository->store($data);

            $customer_id = $user->id;

            $order_no = $this->orderRepository->generateNo();

            $order = $this->orderRepository->store([
                'customer_id' => $customer_id,
                'order_no' => $order_no,
                'total' => \Cart::count(),
            ]);

            Session::flash('success', 'User has been created!');

            return redirect()->route('order.checkout');
        } else {
            $customer_id = \Auth::user()->id;

        }
    }

}
