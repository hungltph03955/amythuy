<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 06/02/2018
 * Time: 09:53
 */
namespace App\Repositories;

interface RatingRepositoryInterface extends \App\Repositories\BaseRepositoryInterface
{
    public function getRating($product_id);
}