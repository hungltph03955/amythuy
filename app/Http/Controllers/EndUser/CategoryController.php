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
        CategoriesRepositoryInterface $categoryRepository,
        ColorRepositoryInterface $colorRepository,
        SizeRepositoryInterface $sizeRepository,
        CollectionRepositoryInterface $collectionRepository,
        MaterialRepositoryInterface $materialRepository,
        ProductsRepositoryInterface $productsRepository
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
        $searchCategory = $request->input('searchCategory');
        $searchColorProduct = $request->input('search_color_id');
        $searchSizeProduct = $request->input('search_size_id');
        $searchCollectionProduct = $request->input('search_collection_id');
        $searchMaterialProduct = $request->input('search_material_id');
        $searchPriceProduct = $request->input('search_price');
        $category = $this->categoriesRepository->getSlug($slug);
        if (empty($category)) {
            abort(404);
        }
        $categoryChiled = $this->categoriesRepository->getCategoryChiled($category->id);
        $color = $this->colorRepository->getColorToAddProduct();
        $size = $this->sizeRepository->getSizeToAddProduct();
        $material = $this->materialRepository->getMaterialToAddProduct();
        $collection = $this->collectionRepository->getCollectionToAddProduct();

        $products = $this->productRepository->FillterProductFromOption($category->id, $searchCategory, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct, $searchPriceProduct);

        return view('endUser.category.show', [
            'slug' => $slug,
            'category' => $category,
            'products' => $products,
            'color' => $color,
            'size' => $size,
            'collection' => $collection,
            'material' => $material,
            'categoryChiled' => $categoryChiled,
            'searchCategory' => $searchCategory,
            'searchColorProduct' => $searchColorProduct,
            'searchSizeProduct' => $searchSizeProduct,
            'searchMaterialProduct' => $searchMaterialProduct,
            'searchCollectionProduct' => $searchCollectionProduct,
            'searchPriceProduct' => $searchPriceProduct,
        ]);
    }
}
