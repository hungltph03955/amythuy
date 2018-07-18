<?php

/**
 */

namespace App\Repositories;

interface ProductsRepositoryInterface extends BaseRepositoryInterface
{

    public function orderBy($params);

    public function getSearch($s);

    public function getProductByFilter($categoryId = 1, $options = []);

    public function searchCategory($searchCategory, $searchNameProduct, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct);

    public function haveProduct($id);

    public function getNameImage($id);

    public function getProductRelated($categoryId);

    public function getTenProduct();

    public function getProductsFromName($searchname);
}
