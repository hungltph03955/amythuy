<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\NewRepositoryInterface;

class HomeController extends Controller
{
    protected $productRepository;
    protected $orderRepository;
    protected $newRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ProductsRepositoryInterface $productsRepository,
        OrderRepositoryInterface $orderRepository,
        NewRepositoryInterface $newRepository
    )
    {
        $this->productRepository = $productsRepository;
        $this->orderRepository = $orderRepository;
        $this->newRepository = $newRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDasskbornd = $this->productRepository->getTenProduct();
        $orderNew = $this->orderRepository->getTenOrderNew();
        $blogNew = $this->newRepository->getTenBlogNew();

        return view('admin.index',
            [
                'productDasskbornd' => $productDasskbornd,
                'orderNew' => $orderNew,
                'blogNew' => $blogNew
            ]);


    }
}
