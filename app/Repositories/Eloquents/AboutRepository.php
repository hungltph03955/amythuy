<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\About;
use App\Repositories\AboutRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
{

    public function getBlankModel()
    {
        return new About();
    }

    public function __construct(About $about)
    {
        $this->model = $about;
    }

    public function getAbout()
    {
        $about = $this->model->first();
        return $about;
    }
}
