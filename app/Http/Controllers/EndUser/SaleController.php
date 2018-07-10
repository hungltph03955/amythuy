<?php

namespace App\Http\Controllers\EndUser;

use App\Repositories\SalesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller {

    public function __construct(
        SalesRepositoryInterface $salesRepository,
        ProductsRepositoryInterface $productsRepository
    ){
        $this->saleRepository = $salesRepository;
        $this->productRepository = $productsRepository;
    }

    public function index(Request $request) {
        $search = $request->input('search');
        $productSales = $this->saleRepository->gets();
        // dd($productSaless);
        return view('endUser.sale.index',[
            'productSales' => $productSales
        ]);
    }

}
