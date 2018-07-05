<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:18
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\dtb_product_collections;
use App\Repositories\Dtb_product_collectionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Exception\Exception;

class Dtb_product_collectionRepository extends BaseRepository implements Dtb_product_collectionRepositoryInterface
{
    public function getBlankModel()
    {
        return new Dtb_product_collections();
    }

    public function __construct(Dtb_product_collections $dtb_product_collections)
    {
        $this->model = $dtb_product_collections;
    }

    public function saveCollectionIdAndProductId($productId, $requestDataMaterialIdValue)
    {
        $dateNow = Carbon::now();
        if (isset($requestDataMaterialIdValue)) {
            $productCollection = new $this->model;
            $productCollection->product_id = $productId;
            $productCollection->collection_id = $requestDataMaterialIdValue;
            $productCollection->author = Auth::user()->id;
            $productCollection->updated_at = $dateNow;
            $productCollection->created_at = $dateNow;
            $productCollection->save();
            if ($productCollection->save()) {
                return $productCollection;
            } else {
                throw new Exception('Invalid value');
            }
        }
    }

    public function getCollectionToEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->select('dtb_product_collections.*')->where('product_id', $productId)->get();
        }
    }

    public function deleteCollectionIdEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->where('product_id', $productId)->forceDelete();
        }
    }
}