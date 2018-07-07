<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:25
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Products;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Sales;


class ProductsRepositoriy extends BaseRepository implements ProductsRepositoryInterface
{
    protected $p = 10;

    public function getBlankModel()
    {
        return new Products();
    }

    public function __construct(Products $products)
    {
        $this->model = $products;
    }

    public function getSearch($s)
    {
        return $this->model->search($s)
            ->paginate($this->p);
    }

    public function getSearchView($s, $p)
    {
        return $this->model->search($s)
            ->paginate($p);
    }

    public function getProductFromCategory($category_id, $s)
    {
        $countproductFormcategory = 9;
        return $this->model->where('category_id', $category_id)->search($s)->paginate($countproductFormcategory);
    }

    public function orderBy($params)
    {
        // dd($params);
        return $this->model->sortable($params)->paginate($this->p);
    }

    public function searchCategory($searchCategory, $searchNameProduct, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct)
    {
        $query = $this->model->select('products.*');

        if (!empty($searchNameProduct) && !empty(trim($searchNameProduct))) {
            $searchNameProductTrim = trim($searchNameProduct);
            $query = $query->where('products.name', 'like', "%{$searchNameProductTrim}%");
        }

        if (!empty($searchCategory) && !empty(trim($searchCategory))) {
            if ($searchCategory != 0) {
                $searchCategoryTrim = trim($searchCategory);
                $query = $query->where('category_id', $searchCategoryTrim);
            }
        }

        if (!empty($searchColorProduct) && !empty(trim($searchColorProduct))) {
            $searchColorProductTrim = trim($searchColorProduct);
            $query = $query
                ->addSelect('products.*', 'colors.name as colors_name', 'colors.id as colors_id')
                ->join('dtb_product_colors', 'products.id', '=', 'dtb_product_colors.product_id')
                ->where('color_id', '=', $searchColorProductTrim)
                ->join('colors', 'dtb_product_colors.color_id', '=', 'colors.id');
        }

        if (!empty($searchSizeProduct) && !empty(trim($searchSizeProduct))) {
            $searchSizeProductTrim = trim($searchSizeProduct);
            $query = $query
                ->addSelect('products.*', 'sizes.name as sizes_name', 'sizes.id as sizes_id')
                ->join('dtb_product_sizes', 'products.id', '=', 'dtb_product_sizes.product_id')
                ->where('size_id', '=', $searchSizeProductTrim)
                ->join('sizes', 'dtb_product_sizes.size_id', '=', 'sizes.id');
        }

        if (!empty($searchMaterialProduct) && !empty(trim($searchMaterialProduct))) {
            $searchMaterialProductTrim = trim($searchMaterialProduct);
            $query = $query
                ->addSelect('products.*', 'materials.name as materials_name', 'materials.id as materials_id')
                ->join('dtb_product_materials', 'products.id', '=', 'dtb_product_materials.product_id')
                ->where('material_id', '=', $searchMaterialProductTrim)
                ->join('materials', 'dtb_product_materials.material_id', '=', 'materials.id');
        }

        if (!empty($searchCollectionProduct) && !empty(trim($searchCollectionProduct))) {
            $searchCollectionProductTrim = trim($searchCollectionProduct);
            $query = $query
                ->addSelect('products.*', 'collections.name as collections_name', 'collections.id as collections_id')
                ->join('dtb_product_collections', 'products.id', '=', 'dtb_product_collections.product_id')
                ->where('collection_id', '=', $searchCollectionProductTrim)
                ->join('collections', 'dtb_product_collections.collection_id', '=', 'collections.id');
        }
        return $query->orderBy('id', 'DESC')->paginate($this->p);
    }

    public function haveProduct($id)
    {
        return $this->model->where('category_id', $id)->count();
    }

    public function getNameImage($id)
    {
        return $this->model->where('id', $id)->value('img');

    }
}