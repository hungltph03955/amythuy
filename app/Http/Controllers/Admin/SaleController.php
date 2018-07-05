<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Repositories\SalesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleRepository;
    protected $productRepository;

    public function __construct(
        SalesRepositoryInterface $salesRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->saleRepository = $salesRepository;
        $this->productRepository = $productsRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $sales = $this->saleRepository->getSearch($search);
        return view('admin.sale.index',[
            'sales' => $sales,
            'search' => $search
        ]);
    }

    public function create($id)
    {
        $sale = $this->saleRepository->getBlankModel();
        $products = $this->productRepository->getAll();
        return view('admin.sale.create',[
            'sale' => $sale,
            'products' => $products,
            'id' => $id
        ]);
    }

    public function store(SaleRequest $request)
    {
        $data = $request->all();
        $sale = $this->saleRepository->store($data);
        if(empty($sale))
        {
            return redirect()->back();
        }
        return redirect()->action('Admin\SaleController@index')->with('mess','Thêm thành công');
    }

    public function show($id)
    {
        $sale = $this->saleRepository->show($id);
        $products = $this->productRepository->getAll();
        if(isset($sale))
        {
            return view('admin.sale.edit',[
                'sale' => $sale,
                'products' => $products
            ]);
        }
        else return redirect()->back();
    }
    public function edit($id)
    {
        $sale = $this->saleRepository->show($id);
        $products = $this->productRepository->getAll();
        if(empty($sale))
        {
            abort(404);
        }

        return view('admin.sale.edit',[
            'sale' => $sale,
            'products' => $products
        ]);
    }
    public function update(SaleRequest $request,$id)
    {
        $sale = $this->saleRepository->update($request->all(),$id);
        if(empty($sale))
        {
            return redirect()->back();
        }
        return redirect('admin/sale')->with('mess','Sửa thành công');
    }
    public function destroy($id)
    {
        $sale = $this->saleRepository->destroy($id);
        if(empty($sale))
        {
            abort(404);
        }
        return redirect('admin/sale')->with('mess','Xóa thành công');
    }
}
