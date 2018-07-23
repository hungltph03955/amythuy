<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\NewRepositoryInterface;
use App\Repositories\ImagesBannerRepositoryInterface;
use App\Repositories\ColorRepositoryInterface;
use App\Repositories\SizeRepositoryInterface;
use App\Repositories\CollectionRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\MaterialRepositoryInterface;

class HomeController extends Controller
{

    protected $productsRepository;
    protected $newRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $collectionRepository;
    protected $materialRepository;
    protected $categories;

    public function __construct(
        ColorRepositoryInterface $colorRepository,
        SizeRepositoryInterface $sizeRepository,
        CollectionRepositoryInterface $collectionRepository,
        MaterialRepositoryInterface $materialRepository,
        ProductsRepositoryInterface $productsRepository,
        NewRepositoryInterface $newRepository,
        CategoriesRepositoryInterface $category,
        ImagesBannerRepositoryInterface $imagesBannerRepository
    )
    {
        $this->productsRepository = $productsRepository;
        $this->newRepository = $newRepository;
        $this->imageBannerRepository = $imagesBannerRepository;
        $this->colorRepository = $colorRepository;
        $this->categories = $category;
        $this->sizeRepository = $sizeRepository;
        $this->collectionRepository = $collectionRepository;
        $this->materialRepository = $materialRepository;
    }

    public function index()
    {
        // $products = $this->productsRepository->getFeaturedProducts(LIMIT_PAGE);
        // $news = $this->newRepository->getNews();
        $news = $products = [];
        $imagesBanner = $this->imageBannerRepository->gets();

        $category = $this->categories->getParentCategories();

        return view('endUser.home.index')->with(
            compact('products', 'news', 'imagesBanner', 'category')
        );
    }

    public function searchAll(Request $request)
    {
        // dd($request->all());
        $searchColorProduct = $request->input('color') ? $request->input('color') : '';
        $searchSizeProduct = $request->input('size') ? $request->input('size') : '';
        $searchCollectionProduct = $request->input('collection') ? $request->input('collection') : '';
        $searchMaterialProduct = $request->input('material') ? $request->input('material') : '';
        $searchPriceProduct = $request->input('price') ? $request->input('price') : '';
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();
        $options = [
            'searchColorProduct' => $searchColorProduct,
            'searchSizeProduct' => $searchSizeProduct,
            'searchMaterialProduct' => $searchMaterialProduct,
            'searchCollectionProduct' => $searchCollectionProduct,
            'searchPriceProduct' => $searchPriceProduct];


        $searchname = $request->input('keyword') ? $request->input('keyword') : '';


        $products = $this->productsRepository->getProductsFromName($searchname, $options);
        $countproducts = $products->total();
        return view('endUser.home.search')->with(
            compact('products', 'color', 'size', 'collection'
                , 'material', 'countproducts', 'searchCategory'
                , 'searchColorProduct', 'searchSizeProduct', 'searchMaterialProduct'
                , 'searchCollectionProduct', 'searchPriceProduct', 'searchname')
        );
    }

}
