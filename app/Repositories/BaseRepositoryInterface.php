<?php

/**
 */

namespace App\Repositories;

interface BaseRepositoryInterface {

    public function getBlankModel();

    public function getAll();

    public function gets();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function destroy($id);
}
