<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:23
 */

namespace App\Repositories;
interface ProductsRepositoryInterface extends BaseRepositoryInterface
{

    public function orderBy($params);

    public function getSearch($s);

    public function getProductFromCategory($category_id, $s);

    public function searchCategory($searchCategory, $searchNameProduct, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct);

    public function haveProduct($id);

    public function getNameImage($id);
}