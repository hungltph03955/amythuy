<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;

class CustomerController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $customers = $this->userRepository->getSearch($search);
        return view('admin.customer.index',[
            'customers' => $customers,
            'search' => $search
        ]);
    }

    public function show($id)
    {
        $customer = $this->userRepository->show($id);
        return view('admin.customer.show',[
            'customer' => $customer
        ]);
    }
}
