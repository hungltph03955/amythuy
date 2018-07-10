<?php

namespace App\Http\Controllers\EndUser;

use App\Repositories\SalesRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller {

    public function __construct(
        SalesRepositoryInterface $salesRepository
    ){
        $this->saleRepository = $salesRepository;
    }

    public function index(Request $request) {
        $productSales = $this->saleRepository->getProductSales();
        return view('endUser.sale.index',[
            'productSales' => $productSales
        ]);
    }

}
