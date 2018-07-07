<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:18
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\dtb_product_materials;
use App\Repositories\Dtb_product_matterialRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Exception\Exception;


class Dtb_product_materialRepository extends BaseRepository implements Dtb_product_matterialRepositoryInterface
{
    public function getBlankModel()
    {
        return new Dtb_product_materials();
    }

    public function __construct(Dtb_product_materials $dtb_product_materials)
    {
        $this->model = $dtb_product_materials;
    }

    public function saveMaterialAndProductId($productId, $requestDataMaterialIdValue)
    {
        $dateNow = Carbon::now();
        if (isset($requestDataMaterialIdValue)) {
            $productMaterial = new $this->model;
            $productMaterial->product_id = $productId;
            $productMaterial->material_id = $requestDataMaterialIdValue;
            $productMaterial->author = Auth::user()->id;
            $productMaterial->updated_at = $dateNow;
            $productMaterial->created_at = $dateNow;
            $productMaterial->save();
            if ($productMaterial->save()) {
                return $productMaterial;
            } else {
                throw new Exception('Invalid value');
            }
        }
    }

    public function getMaterialToEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->select('dtb_product_materials.*', 'materials.name as materials_name')->where('product_id', $productId)->join('materials', 'dtb_product_materials.material_id', '=', 'materials.id')->get();
        }
    }

    public function deleteMaterialIdEditProduct($productId)
    {
        if (isset($productId)) {
            return $this->model->where('product_id', $productId)->forceDelete();
        }
    }

}