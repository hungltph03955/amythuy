<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Materials;
use App\Repositories\MaterialRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MaterialRepository extends BaseRepository implements MaterialRepositoryInterface
{

    public function getBlankModel()
    {
        return new Materials();
    }

    public function __construct(Materials $material)
    {
        $this->model = $material;
    }

    public function selectToArray()
    {
        return $this->model->select('id', 'name', 'status', 'description', 'created_at', 'updated_at')
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
    }

    public function getMaterialToAddProduct()
    {
        return $this->model->select('id', 'name')
            ->where('status', 0)
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
    }

    public function getMaterialName($id)
    {
        if ($id != 0 && $id != "Choose an option" && $id != "") {
            $material = $this->model->select('name')
                ->where('id', $id)->first();
            return $material->name;
        }
    }
}
