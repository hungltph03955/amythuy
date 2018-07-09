<?php

namespace App\Http\Controllers\EndUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\ColorRepositoryInterface;
use App\Repositories\SizeRepositoryInterface;
use App\Repositories\CollectionRepositoryInterface;
use App\Repositories\MaterialRepositoryInterface;

class CategoryController extends Controller
{

    protected $categoriesRepository;
    protected $productRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $collectionRepository;
    protected $materialRepository;

    public function __construct(
        CategoriesRepositoryInterface $categoryRepository, ColorRepositoryInterface $colorRepository, SizeRepositoryInterface $sizeRepository, CollectionRepositoryInterface $collectionRepository, MaterialRepositoryInterface $materialRepository, ProductsRepositoryInterface $productsRepository
    )
    {
        $this->categoriesRepository = $categoryRepository;
        $this->colorRepository = $colorRepository;
        $this->sizeRepository = $sizeRepository;
        $this->collectionRepository = $collectionRepository;
        $this->materialRepository = $materialRepository;
        $this->productRepository = $productsRepository;
    }

    public function show(Request $request, $slug)
    {
        $category = $this->categoriesRepository->getSlug($slug);
        if (empty($category)) {
            abort(404);
        }

        $searchCategory = $request->input('category');
        $searchColorProduct = $request->input('color');
        $searchSizeProduct = $request->input('size');
        $searchCollectionProduct = $request->input('collection');
        $searchMaterialProduct = $request->input('material');
        $searchPriceProduct = $request->input('price');

        $categoryChiled = $this->categoriesRepository->getCategoryChiled($category->id);
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();
        $options = [
            'searchCategory' => $searchCategory,
            'searchColorProduct' => $searchColorProduct,
            'searchSizeProduct' => $searchSizeProduct,
            'searchMaterialProduct' => $searchMaterialProduct,
            'searchCollectionProduct' => $searchCollectionProduct,
            'searchPriceProduct' => $searchPriceProduct];
        $products = $this->productRepository->getProductByFilter($category->id, $options);
        $countproducts = $products->total();
        return view('endUser.category.show', compact(
            'slug', 'category', 'products', 'color', 'size', 'collection'
            , 'material', 'categoryChiled', 'searchCategory'
            , 'searchColorProduct', 'searchSizeProduct', 'searchMaterialProduct'
            , 'searchCollectionProduct', 'searchPriceProduct', 'countproducts'));
    }

}
