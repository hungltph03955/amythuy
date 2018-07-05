<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:17
 */

namespace App\Repositories;
interface Dtb_product_sizeRepositoryInterface extends BaseRepositoryInterface
{
    public function saveSizeIdAndProductId($productId, $requestDataSizeIdValue);

    public function getSizeToEditProduct($productId);

    public function deleteSizeIdEditProduct($productId);
}