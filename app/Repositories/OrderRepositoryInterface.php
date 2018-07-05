<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 22/02/2018
 * Time: 08:32
 */
namespace App\Repositories;
interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getSearch($s);
}