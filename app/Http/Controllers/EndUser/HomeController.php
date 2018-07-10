<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\NewRepositoryInterface;

class HomeController extends Controller {

    //
    protected $productsRepository;
    protected $categories;
    protected $imageBannerRepository;
    protected $imagesRepository;

    public function __construct(
        ProductsRepositoryInterface $productsRepository, 
        NewRepositoryInterface $newRepository) {
        $this->productsRepository = $productsRepository;
        $this->newRepository = $newRepository;
    }

    public function index(Request $request) {
        $search = $request->input('s');
        $products = $this->productsRepository->getFeaturedProducts(LIMIT_PAGE);
        $news = $this->newRepository->getNews();
        // dd($products);
        return view('endUser.home.index')->with(
            compact('products', 'news', 'imagesbanner')
        );
    }

}
