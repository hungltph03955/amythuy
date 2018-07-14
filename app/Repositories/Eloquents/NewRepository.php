<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Color;
use App\Models\Admin\News;
use App\Repositories\NewRepositoryInterface;
use Illuminate\Support\Facades\DB;

class NewRepository extends BaseRepository implements NewRepositoryInterface
{

    public function getBlankModel()
    {
        return new News();
    }

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getAllNews()
    {
        return $this->model->select('id', 'name', 'slug', 'status', 'description', 'created_at', 'img', 'updated_at')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getNews()
    {
        return $this->model->select('id', 'name', 'slug', 'status', 'description', 'created_at', 'img', 'updated_at')
            ->orderBy('id', 'DESC')
            ->paginate(LIMIT_PAGE);
    }

    public function getTenBlogNew()
    {
        return $this->model->limit(LIMIT_PAGE)->orderBy('id', 'DESC')->get();
    }

}
