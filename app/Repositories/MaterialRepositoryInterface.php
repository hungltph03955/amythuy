<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:17
 */

namespace App\Repositories;
interface MaterialRepositoryInterface extends BaseRepositoryInterface
{
    public function selectToArray();

    public function getMaterialToAddProduct();

}