<?php

/**
 */

namespace App\Repositories;

interface SizeRepositoryInterface extends BaseRepositoryInterface
{

    public function selectToArray();

    public function getSizeToAddProduct();

    public function getSizeName($id);
}
