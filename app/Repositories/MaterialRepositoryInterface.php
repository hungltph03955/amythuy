<?php

/**
 */

namespace App\Repositories;

interface MaterialRepositoryInterface extends BaseRepositoryInterface
{

    public function selectToArray();

    public function getMaterialToAddProduct();

    public function getMaterialName($id);
}
