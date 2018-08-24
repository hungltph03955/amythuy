<?php

/**
 */

namespace App\Repositories;

interface Dtb_product_categoryRepositoryInterface extends BaseRepositoryInterface {

    public function saveCategoryIdAndProductId($productId, $categoryId);

    public function getCategoryToEditProduct($productId);
}
