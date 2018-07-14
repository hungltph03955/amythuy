<?php
/**
 */

namespace App\Repositories;
interface NewRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllNews();

    public function getTenBlogNew();
}