<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\NewRepositoryInterface;
use App\Repositories\ImagesBannerRepositoryInterface;

class HomeController extends Controller
{

    //
    protected $productsRepository;
    protected $newRepository;

    public function __construct(
        ProductsRepositoryInterface $productsRepository,
        NewRepositoryInterface $newRepository,
        ImagesBannerRepositoryInterface $imagesBannerRepository
    )
    {
        $this->productsRepository = $productsRepository;
        $this->newRepository = $newRepository;
        $this->imageBannerRepository = $imagesBannerRepository;
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

}
