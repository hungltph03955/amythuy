<?php

/**
 */

namespace App\Repositories;

interface Dtb_product_sizeRepositoryInterface extends BaseRepositoryInterface {

    public function saveSizeIdAndProductId($productId, $requestDataSizeIdValue);

    public function getSizeToEditProduct($productId);

    public function deleteSizeIdEditProduct($productId);
}
