<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\ImageBanner;
use App\Repositories\ImagesBannerRepositoryInterface;

class ImageBannerRepository extends BaseRepository implements ImagesBannerRepositoryInterface {

    public function getBlankModel() {
        return new ImageBanner();
    }

    public function __construct(ImageBanner $imageBanner) {
        $this->model = $imageBanner;
    }

    public function getFileName($id) {
        return $this->model->where('id', $id)->value('name');
    }

}
