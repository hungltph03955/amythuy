<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:18
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\dtb_product_sizes;
use App\Repositories\Dtb_product_sizeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Exception\Exception;

class Dtb_product_sizeRepository extends BaseRepository implements Dtb_product_sizeRepositoryInterface
{
    public function getBlankModel()
    {
        return new Dtb_product_sizes();
    }

    public function __construct(Dtb_product_sizes $dtb_product_sizes)
    {
        $this->model = $dtb_product_sizes;
    }

    public function saveSizeIdAndProductId($productId, $requestDataSizeIdValue)
    {
        $dateNow = Carbon::now();
        if (isset($requestDataSizeIdValue)) {
            $productSize = new $this->model;
            $productSize->product_id = $productId;
            $productSize->size_id = $requestDataSizeIdValue;
            $productSize->author = Auth::user()->id;
            $productSize->updated_at = $dateNow;
            $productSize->created_at = $dateNow;
            $productSize->save();
            if ($productSize->save()) {
                return $productSize;
            } else {
                throw new Exception('Invalid value');
            }
        }
    }

    public function getSizeToEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->select('dtb_product_sizes.*')->where('product_id', $productId)->get();
        }
    }

    public function deleteSizeIdEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->where('product_id', $productId)->forceDelete();
        }
    }


}