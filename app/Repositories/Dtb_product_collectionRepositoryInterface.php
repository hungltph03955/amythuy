<?php

/**
 */

namespace App\Repositories;

interface Dtb_product_collectionRepositoryInterface extends BaseRepositoryInterface {

    public function saveCollectionIdAndProductId($productId, $requestDataMaterialIdValue);

    public function getCollectionToEditProduct($productId);
}
