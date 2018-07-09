<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\dtb_product_colors;
use App\Repositories\Dtb_product_colorRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Exception\Exception;

class Dtb_product_colorRepository extends BaseRepository implements Dtb_product_colorRepositoryInterface {

    public function getBlankModel() {
        return new Dtb_product_colors();
    }

    public function __construct(Dtb_product_colors $dtb_product_colors) {
        $this->model = $dtb_product_colors;
    }

    public function saveColorIdAndProductId($productId, $requestDataColorIdValue, $fileNameImageColor) {
        $dateNow = Carbon::now();
        if (isset($requestDataColorIdValue)) {
            $productColor = new $this->model;
            $productColor->product_id = $productId;
            $productColor->color_id = $requestDataColorIdValue;
            $productColor->author = Auth::user()->id;
            $productColor->img = isset($fileNameImageColor) ? $fileNameImageColor : '';
            $productColor->updated_at = $dateNow;
            $productColor->created_at = $dateNow;
            $productColor->save();
            if ($productColor->save()) {
                return $productColor;
            } else {
                throw new Exception('Invalid value');
            }
        }
    }

    public function getColorToAddProduct() {
        return $this->model->select('id', 'name')->where('status', 0)->orderBy('id', 'DESC')->get()->toArray();
    }

    public function getColorToEditProduct($id) {
        if (isset($id)) {
            return $this->model->select('dtb_product_colors.*', 'colors.name as colors_name', 'colors.id as colors_id')
                    ->where('product_id', $id)
                    ->join('colors', 'dtb_product_colors.color_id', '=', 'colors.id')
                    ->get();
        }
    }

}
