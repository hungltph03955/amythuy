<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:17
 */

namespace App\Repositories;
interface Dtb_product_matterialRepositoryInterface extends BaseRepositoryInterface
{
    public function saveMaterialAndProductId($productId, $requestDataMaterialIdValue);

    public function getMaterialToEditProduct($productId);

    public function deleteMaterialIdEditProduct($productId);
}