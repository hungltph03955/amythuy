<?php

/**
 */

namespace App\Repositories;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{

    public function generateNo();

    public function getSearch($s);

    public function updateStatus($data, $id);

    public function generateOrderCode($id);
}
