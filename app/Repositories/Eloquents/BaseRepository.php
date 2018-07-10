<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface {

    protected $model;
    // set default value for paginate
    protected $p = LIMIT_PAGE;

    public function __construct(Model $model) {
        $this->model = $model;
        $this->boot();
    }

    abstract public function getBlankModel();

    public function gets() {
        return $this->model->paginate($this->p);
    }

    public function getAll() {
        return $this->model->all();
    }

    public function store($data) {
        if (empty($data)) {
            return redirect()->back()->withErrors('Data is not found');
        }
        return $this->model->create($data);
    }

    public function show($id) {
        return $this->model->findOrFail($id);
    }

    public function update($data, $id) {
        if (empty($data)) {
            return redirect()->back()->withErrors('Data is not found');
        }
        return $this->model->findOrFail($id)->update($data);
    }

    public function destroy($id) {
        return $this->model->findOrFail($id)->delete();
    }

}
