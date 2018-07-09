<?php

/**
 */

namespace App\Repositories;

interface ImagesBannerRepositoryInterface extends BaseRepositoryInterface {

    public function getFileName($id);
}
