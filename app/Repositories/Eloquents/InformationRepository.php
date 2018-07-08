<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 12/02/2018
 * Time: 10:22
 */

namespace App\Repositories\Eloquents;
use App\Models\Admin\Information;
use App\Repositories\InformationRepositoryInterface;


class InformationRepository extends BaseRepository implements InformationRepositoryInterface
{
    protected $p = 10;

    public function getBlankModel()
    {
        return new Information();
    }
    public function __construct(Information $information)
    {
        $this->model = $information;
    }
    public function getSearch($s)
    {
        return $this->model->search($s)
            ->paginate($this->p);
    }
}