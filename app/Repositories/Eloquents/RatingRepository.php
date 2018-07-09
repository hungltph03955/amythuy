<?php

/**
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin\Rating;
use App\Repositories\RatingRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RatingRepository extends BaseRepository implements RatingRepositoryInterface {

    public function getBlankModel() {
        return new Rating();
    }

    public function __construct(Rating $rating) {
        $this->model = $rating;
    }

    public function getRating($product_id) {
        $stars = DB::table('ratings')
                ->where('product_id', $product_id)
                ->avg('rating');
        return $stars;
    }

}
