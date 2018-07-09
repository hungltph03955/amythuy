<?php

/**
 */

namespace App\Repositories;

interface ImagesRepositoryInterface extends BaseRepositoryInterface {

    public function getFileName($id);

    public function saveImageDetailAndProductId($productId, $fileNameImageDetail);
}
