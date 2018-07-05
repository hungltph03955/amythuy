<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'product_id',
        'customer_id',
        'rating',
    ];
    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Products::class, 'product_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Admin\Customer::class, 'customer_id', 'id');
    }
}
