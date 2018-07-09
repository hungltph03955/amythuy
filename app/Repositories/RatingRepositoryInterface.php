<?php

/**
 */

namespace App\Repositories;

interface RatingRepositoryInterface extends \App\Repositories\BaseRepositoryInterface {

    public function getRating($product_id);
}
