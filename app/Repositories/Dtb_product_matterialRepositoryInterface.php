<?php
/**
 */

namespace App\Repositories;
interface Dtb_product_matterialRepositoryInterface extends BaseRepositoryInterface
{
    public function saveMaterialAndProductId($productId, $requestDataMaterialIdValue);

    public function getMaterialToEditProduct($productId);

    public function deleteMaterialIdEditProduct($productId);
}