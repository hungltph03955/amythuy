<?php

/**
 */

namespace App\Repositories;

interface CollectionRepositoryInterface extends BaseRepositoryInterface {

    public function selectToArray();

    public function getCollectionToAddProduct();
}
