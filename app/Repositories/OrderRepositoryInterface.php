<?php
/**
 */
namespace App\Repositories;
interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function generateNo();
}