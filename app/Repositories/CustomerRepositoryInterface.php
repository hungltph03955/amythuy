<?php
/**
 */
namespace App\Repositories;

interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    public function getSearch($s);
}