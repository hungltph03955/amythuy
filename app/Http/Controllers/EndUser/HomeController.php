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
use App\Repositories\MaterialRepositoryInterface;

class HomeController extends Controller
{

    protected $productsRepository;
    protected $newRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $collectionRepository;
    protected $materialRepository;

    public function __construct(
        ColorRepositoryInterface $colorRepository,
        SizeRepositoryInterface $sizeRepository,
        CollectionRepositoryInterface $collectionRepository,
        MaterialRepositoryInterface $materialRepository,
        ProductsRepositoryInterface $productsRepository,
        NewRepositoryInterface $newRepository,
        ImagesBannerRepositoryInterface $imagesBannerRepository
    )
    {
        $this->productsRepository = $productsRepository;
        $this->newRepository = $newRepository;
        $this->imageBannerRepository = $imagesBannerRepository;
        $this->colorRepository = $colorRepository;
        $this->sizeRepository = $sizeRepository;
        $this->collectionRepository = $collectionRepository;
        $this->materialRepository = $materialRepository;
    }

    public function index()
    {
        $products = $this->productsRepository->getFeaturedProducts(LIMIT_PAGE);
        $news = $this->newRepository->getNews();
        $imagesBanner = $this->imageBannerRepository->gets();
        return view('endUser.home.index')->with(
            compact('products', 'news', 'imagesBanner')
        );
    }

    public function searchNameAll(Request $request)
    {
        if ($request->all()['_token'] != '') {
            $color = $this->colorRepository->getColorToAddProduct();
            $size = $this->sizeRepository->getSizeToAddProduct();
            $material = $this->materialRepository->getMaterialToAddProduct();
            $collection = $this->collectionRepository->getCollectionToAddProduct();
            $searchname = $request->all()['searchNameAll'];
            $products = $this->productsRepository->getProductsFromName($searchname);
            $countproducts = $products->total();
            return view('endUser.SearchAll.show')->with(
                compact('products', 'color', 'size', 'collection'
                    , 'material', 'countproducts')
            );
        }
    }

}
