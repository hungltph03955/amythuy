<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 08/02/2018
 * Time: 16:13
 */

namespace App\Repositories;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getSearch($s);

}