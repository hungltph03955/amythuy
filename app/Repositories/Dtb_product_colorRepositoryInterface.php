<?php
/**
 */

namespace App\Repositories;
interface Dtb_product_colorRepositoryInterface extends BaseRepositoryInterface
{
    public function saveColorIdAndProductId($productId, $requestDataColorIdValue, $fileNameImageColor);

    public function getColorToEditProduct($id);

}