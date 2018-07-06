<?php

namespace App\Http\Controllers\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Models\Products;
use App\Repositories\ImagesBannerRepositoryInterface;

class HomeController extends Controller
{
    //
    protected $product;
    protected $categories;
    protected $imageBannerRepository;


    public function __construct(
        ProductsRepositoryInterface $product,
        CategoriesRepositoryInterface $category,
        ImagesBannerRepositoryInterface $imagesBannerRepository)
    {
        $this->product = $product;
        $this->categories = $category;
        $this->imageBannerRepository = $imagesBannerRepository;
    }

    private function getDataInVar()
    {

    }

    public function index(Request $request)
    {
        $search = $request->input('s');
        $cates = $this->categories->gets();
        $products = $this->product->getSearch($search, $p = 2);
        $imagesbanner = $this->imageBannerRepository->getAll();

        // dd($products);
        return view('endUser.index')->with([
            'cates' => $cates,
            'products' => $products,
            'imagesbanner' => $imagesbanner
        ]);
    }

    public function show(Request $request, $id)
    {

        $product = $this->product->show($id);
        // $product->views = $product->views + 1;
        $cates = $this->categories->gets();
        // $product->save();

        return view('homepage.show')->with([
            'product' => $product,
            'cates' => $cates,
        ]);
    }

    public function orderBy(Request $request)
    {

        $type_sort = $request->input('type');
        $products = $this->product->orderBy($type_sort);
        $html = view('homepage.separate', compact('products'))->render();
        return response()->json(compact('html'));
    }

    public function blog()
    {
        return view('homepage.blog');
    }


}
