<?php

/**
 */

namespace App\Repositories;

interface ProductsRepositoryInterface extends BaseRepositoryInterface {

    public function orderBy($params);

    public function getSearch($s);

    public function FillterProductFromOption($category_id, $searchCategory, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct, $searchPriceProduct);

    public function searchCategory($searchCategory, $searchNameProduct, $searchColorProduct, $searchSizeProduct, $searchMaterialProduct, $searchCollectionProduct);

    public function haveProduct($id);

    public function getNameImage($id);

    public function getProductRelated($categoryId);
}
