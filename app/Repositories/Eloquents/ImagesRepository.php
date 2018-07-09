<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Images;
use App\Repositories\ImagesRepositoryInterface;
use Carbon\Carbon;
use Psy\Exception\Exception;

class ImagesRepository extends BaseRepository implements ImagesRepositoryInterface {

    public function getBlankModel() {
        return new Images();
    }

    public function __construct(Images $images) {
        $this->model = $images;
    }

    public function saveImageDetailAndProductId($productId, $fileNameImageDetail) {
        $dateNow = Carbon::now();
        if (isset($fileNameImageDetail)) {
            $productImageDetail = new $this->model;
            $productImageDetail->product_id = $productId;
            $productImageDetail->name = $fileNameImageDetail;
            $productImageDetail->updated_at = $dateNow;
            $productImageDetail->created_at = $dateNow;
            $productImageDetail->save();
            if ($productImageDetail->save()) {
                return $productImageDetail;
            } else {
                throw new Exception('Invalid value');
            }
        }
    }

    public function getFileName($productId) {
        if (isset($productId)) {
            return $this->model->where('product_id', $productId)->get();
        }
    }

}
