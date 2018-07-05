<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 05/02/2018
 * Time: 13:37
 */
namespace App\Repositories;

interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    public function getSearch($s);
}