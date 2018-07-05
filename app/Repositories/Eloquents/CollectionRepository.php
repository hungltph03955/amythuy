<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:18
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Collections;
use App\Repositories\CollectionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CollectionRepository extends BaseRepository implements CollectionRepositoryInterface
{
    public function getBlankModel()
    {
        return new Collections();
    }

    public function __construct(Collections $collection)
    {
        $this->model = $collection;
    }

    public function selectToArray()
    {
        return $this->model->select('id', 'name', 'status', 'description', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get()->toArray();
    }

    public function getCollectionToAddProduct()
    {
        return $this->model->select('id', 'name')->where('status', 0)->orderBy('id', 'DESC')->get()->toArray();
    }

}