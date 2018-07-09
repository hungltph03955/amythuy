<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Color;
use App\Models\Admin\News;
use App\Repositories\NewRepositoryInterface;
use Illuminate\Support\Facades\DB;

class NewRepository extends BaseRepository implements NewRepositoryInterface {

    public function getBlankModel() {
        return new News();
    }

    protected $p = 10;

    public function __construct(News $news) {
        $this->model = $news;
    }

    public function getAllNews() {
        return $this->model->select('id', 'name', 'status', 'description', 'created_at', 'img', 'updated_at')
                ->orderBy('id', 'DESC')
                ->get();
    }

}
