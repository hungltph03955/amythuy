<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:17
 */

namespace App\Repositories;
interface Dtb_product_collectionRepositoryInterface extends BaseRepositoryInterface
{
    public function saveCollectionIdAndProductId($productId, $requestDataMaterialIdValue);

    public function getCollectionToEditProduct($productId);
}