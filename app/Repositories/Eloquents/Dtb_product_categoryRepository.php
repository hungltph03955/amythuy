<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\dtb_product_categories;
use App\Repositories\Dtb_product_categoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Exception\Exception;

class Dtb_product_categoryRepository extends BaseRepository implements Dtb_product_categoryRepositoryInterface {

    public function getBlankModel() {
        return new Dtb_product_categories();
    }

    public function __construct(Dtb_product_categories $dtb_product_categories) {
        $this->model = $dtb_product_categories;
    }

    public function saveCategoryIdAndProductId($productId, $categoryIds) {
        $dateNow = Carbon::now();
        if (isset($categoryIds)) {
            foreach ($categoryIds as $categoryId){
                $data[] = [
                    'product_id' => $productId,
                    'category_id' => $categoryId,
                    'updated_at' => $dateNow,
                    'created_at' => $dateNow,
                ];
            }
            if (!$this->model->insert($data)) {
                throw new Exception('Invalid value');
            }
        }
    }

    public function deleteCategoryIdEditProduct($productId) {
        if (isset($productId)) {
            return $this->model->where('product_id', $productId)->forceDelete();
        }
    }

    public function getCategory($productId) {
        if (isset($productId)) {
            return $this->model->select('dtb_product_categories.*', 'categories.name as categories_name')
                            ->where('product_id', $productId)
                            ->join('categories', 'dtb_product_categories.category_id', '=', 'categories.id')
                            ->get()
                            ->pluck("categories_name")
                            ->toArray();
        }
    }

    public function getCategoryToEditProduct($productId) {
        if (isset($productId)) {
            return $this->model->select('dtb_product_categories.*')
                            ->where('product_id', $productId)
                            ->get()
                            ->pluck("category_id")
                            ->toArray();
        }
    }

}
