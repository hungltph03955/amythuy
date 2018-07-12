<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Color;
use App\Repositories\ColorRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{

    public function getBlankModel()
    {
        return new Color();
    }

    public function __construct(Color $color)
    {
        $this->model = $color;
    }

    public function selectToArray()
    {
        return $this->model->select('id', 'name', 'status', 'description', 'created_at', 'updated_at')
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
    }

    public function getColorToAddProduct()
    {
        return $this->model->select('id', 'name')
            ->where('status', 0)
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
    }

    public function getColorName($id)
    {
        if ($id != 0 && $id != "Choose an option" && $id != "") {
            $color = $this->model->select('name')
                ->where('id', $id)->first();
            return $color->name;
        }
    }

}
