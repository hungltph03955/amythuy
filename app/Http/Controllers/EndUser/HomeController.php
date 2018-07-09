<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Models\Products;
use App\Repositories\ImagesBannerRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;

class HomeController extends Controller {

    //
    protected $product;
    protected $categories;
    protected $imageBannerRepository;
    protected $imagesRepository;

    public function __construct(
        ProductsRepositoryInterface $product, 
        CategoriesRepositoryInterface $category,
        ImagesRepositoryInterface $imagesRepository,
        ImagesBannerRepositoryInterface $imagesBannerRepository) {
        $this->product = $product;
        $this->categories = $category;
        $this->imageBannerRepository = $imagesBannerRepository;
        $this->imagesRepository = $imagesRepository;
    }

    public function index(Request $request) {
        $search = $request->input('s');
        $products = $this->product->getSearch($search, $p = 2);
        $imagesbanner = $this->imageBannerRepository->getAll();
        return view('endUser.home.index')->with([
                    'products' => $products,
                    'imagesbanner' => $imagesbanner
        ]);
    }

}
