<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\OrderDetailRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;

class OrderController extends Controller {

    protected $customerRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
    CustomerRepositoryInterface $customerRepository, OrderRepositoryInterface $orderRepository, OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index() {
        return view('endUser.order.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required',
                    'email' => 'required|email',
                    'address' => 'required',
                    'phone_number' => 'required'
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        if ($this->validator($data)->fails()) {
            return redirect()->route('endUser.order.index')
                            ->withErrors($this->validator($data))
                            ->withInput();
        }
        // Start transaction!
        DB::beginTransaction();
        try {
            $customer = $this->customerRepository->store($data);
            $order = $this->orderRepository->store([
                'customer_id' => $customer->id,
                'order_code' => $this->orderRepository->generateOrderCode($customer->id),
                'total' => \Cart::total(),
            ]);
            $this->orderDetailRepository->store([
                'order_id' => $order->id,
                'quantity' => \Cart::count(),
                'total' => \Cart::total(),
                'options' => json_encode(\Cart::content())
            ]);

            \Cart::destroy();
            Session::flash('message.level', 'success');
            Session::flash('message.content', 'Order has been created!');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('message.level', 'error');
            Session::flash('message.content', 'Error!');
            // echo $e->getMessage();
        }
        DB::commit();
        return redirect()->route('endUser.order.index');
    }

}
