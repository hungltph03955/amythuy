<?php

/**
 */

namespace App\Repositories;

interface CategoriesRepositoryInterface extends BaseRepositoryInterface {

    public function selectToArray();

    public function getSlug($slug);

    public function haveParentId($id);

    public function getCategoryChiled($id);

    public function getParentCategories();
}
