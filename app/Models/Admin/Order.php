<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id',
        'order_code',
        'total',
        'status',
        'cancel_description'
    ];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(\App\Models\Admin\Customer::class, 'customer_id', 'id');
    }

    protected function generateNo()
    {
        $var = '000';
        $orderCode = 'HD' . date("ymd") . '-' . str_pad(++$var, 4, '0', STR_PAD_LEFT);

        while (Order::whereId($orderCode)->count() > 0) {
            $orderCode = 'HD' . date("ymd") . '-' . str_pad(++$var, 4, '0', STR_PAD_LEFT);
        }

        return $orderCode;
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('order_code', 'like', '%' . $s . '%');
    }
}
