<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\ProductsRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoriesRepository;
    protected $productRepository;

    public function __construct(
        CategoriesRepositoryInterface $categoryRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->categoriesRepository = $categoryRepository;
        $this->productRepository = $productsRepository;
    }

    public function show(Request $request, $slug)
    {
        $s = $request->input('s');
        $category = $this->categoriesRepository->getSlug($slug);
        if (empty($category->value('slug'))) {
            abort(404);
        }
        $products = $this->productRepository
            ->getProductFromCategory($category->value('id'), $s);
        return view('customer.category.show', [
            'slug' => $slug,
            'category' => $category,
            'products' => $products,
            's' => $s,
        ]);
    }
}
