<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 06/03/2018
 * Time: 09:24
 */
namespace App\Repositories;
interface ImagesBannerRepositoryInterface extends BaseRepositoryInterface
{
    public function getFileName($id);
}