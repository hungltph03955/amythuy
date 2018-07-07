<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:18
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Categories;
use App\Repositories\CategoriesRepositoryInterface;
use Illuminate\Support\Facades\DB;


class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    public function getBlankModel()
    {
        return new Categories();
    }

    public function __construct(Categories $categories)
    {
        $this->model = $categories;
    }

    public function selectToArray()
    {
        return $this->model->select('id', 'name', 'parent_id', 'description', 'updated_at', 'created_at', 'status')->get()->toArray();
    }

    public function getSlug($slug)
    {
        return $this->model->where('slug', $slug);
    }

    public function haveParentId($id)
    {
        return $this->model->where('parent_id', $id)->count();
    }

    public function getParentCategories()
    {
        return $this->model->where('parent_id', 0)->get();
    }

}