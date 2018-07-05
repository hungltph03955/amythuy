<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 12/02/2018
 * Time: 10:21
 */
namespace App\Repositories;
interface InformationRepositoryInterface extends \App\Repositories\BaseRepositoryInterface
{
    public function getSearch($s);
}