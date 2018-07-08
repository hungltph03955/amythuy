<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'quantity',
        'total',
        'options'
    ];
    protected $dates = ['deleted_at'];
    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Products::class,'product_id','id');
    }
    public function order()
    {
        return $this->belongsTo(\App\Models\Admin\Order::class,'order_id','id');
    }
}
