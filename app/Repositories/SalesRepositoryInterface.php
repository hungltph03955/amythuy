<?php

/**
 */

namespace App\Repositories;

interface SalesRepositoryInterface extends BaseRepositoryInterface {

    public function getSearch($s);

    public function haveSaleProduct($id);

    public function getProductSales();
}
