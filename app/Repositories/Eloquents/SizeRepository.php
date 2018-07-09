<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Sizes;
use App\Repositories\SizeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SizeRepository extends BaseRepository implements SizeRepositoryInterface {

    public function getBlankModel() {
        return new Sizes();
    }

    public function __construct(Sizes $sizes) {
        $this->model = $sizes;
    }

    public function selectToArray() {
        return $this->model->select('id', 'name', 'status', 'description', 'created_at', 'updated_at')
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->toArray();
    }

    public function getSizeToAddProduct() {
        return $this->model->select('id', 'name')
                        ->where('status', 0)
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->toArray();
    }

}
