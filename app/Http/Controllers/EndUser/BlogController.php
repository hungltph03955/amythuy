<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\CategoriesRepositoryInterface;
use App\Models\Products;
use App\Repositories\ImagesBannerRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;

class BlogController extends Controller
{
    //
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

    private function getDataInVar()
    {

    }

    public function blog()
    {
        return view('endUser.blog.blog');
    }


}
