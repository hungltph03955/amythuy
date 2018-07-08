<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Models\Products;
use App\Repositories\ImagesBannerRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use App\Repositories\Dtb_product_matterialRepositoryInterface;
use App\Repositories\Dtb_product_colorRepositoryInterface;
use App\Repositories\Dtb_product_sizeRepositoryInterface;

class ProductController extends Controller
{
    protected $product;
    protected $categories;
    protected $imageBannerRepository;
    protected $imagesRepository;
    protected $dtb_product_colorRepository;
    protected $dtb_product_materialRepository;
    protected $dtb_product_sizeRepository;


    public function __construct(
        ProductsRepositoryInterface $product,
        CategoriesRepositoryInterface $category,
        ImagesRepositoryInterface $imagesRepository,
        Dtb_product_colorRepositoryInterface $dtb_product_colorRepository,
        Dtb_product_sizeRepositoryInterface $dtb_product_sizeRepository,
        Dtb_product_matterialRepositoryInterface $dtb_product_materialRepository,
        ImagesBannerRepositoryInterface $imagesBannerRepository)
    {
        $this->product = $product;
        $this->categories = $category;
        $this->imageBannerRepository = $imagesBannerRepository;
        $this->dtb_product_sizeRepository = $dtb_product_sizeRepository;
        $this->dtb_product_materialRepository = $dtb_product_materialRepository;
        $this->dtb_product_colorRepository = $dtb_product_colorRepository;
        $this->imagesRepository = $imagesRepository;
    }

    public function show(Request $request, $id, $slug)
    {
        $product = $this->product->show($id);
        $sizeCurrent = $this->dtb_product_sizeRepository->getSizeToEditProduct($id);
        $colorCurrent = $this->dtb_product_colorRepository->getColorToEditProduct($id);
        $materialCurrent = $this->dtb_product_materialRepository->getMaterialToEditProduct($id);
        $imageProductDetail = $this->imagesRepository->getFileName($id);
        $cates = $this->categories->gets();
        $productRelated = $this->product->getProductRelated($product->category_id);
        return view('endUser.product.show')->with([
            'product' => $product,
            'productImageDetail' => $imageProductDetail,
            'colorCurrent' => $colorCurrent,
            'materialCurrent' => $materialCurrent,
            'sizeCurrent' => $sizeCurrent,
            'productRelated' => $productRelated,
            'cates' => $cates,
        ]);
    }


}
