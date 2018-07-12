<?php

/**
 */

namespace App\Repositories;

interface ColorRepositoryInterface extends BaseRepositoryInterface
{

    public function selectToArray();

    public function getColorToAddProduct();

    public function getColorName($id);
}
