<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Models\Products;
use App\Repositories\ImagesBannerRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;

class ProductController extends Controller
{
    protected $product;
    protected $categories;
    protected $imageBannerRepository;
    protected $imagesRepository;


    public function __construct(
        ProductsRepositoryInterface $product,
        CategoriesRepositoryInterface $category,
        ImagesRepositoryInterface $imagesRepository,
        ImagesBannerRepositoryInterface $imagesBannerRepository)
    {
        $this->product = $product;
        $this->categories = $category;
        $this->imageBannerRepository = $imagesBannerRepository;
        $this->imagesRepository = $imagesRepository;
    }

    public function show(Request $request, $slug, $id)
    {
        $product = $this->product->show($id);
        $imageProductDetail = $this->imagesRepository->getFileName($id);
        $cates = $this->categories->gets();
        return view('endUser.product.show')->with([
            'product' => $product,
            'productImageDetail' => $imageProductDetail,
            'cates' => $cates,
        ]);
    }


}
