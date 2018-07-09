<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    protected $p = 10;

    public function getBlankModel() {
        return new User();
    }

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function getSearch($s) {
        return $this->model->search($s)
                        ->paginate($this->p);
    }

}
