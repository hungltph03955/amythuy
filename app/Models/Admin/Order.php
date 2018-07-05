<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id',
        'order_no',
        'total',
        'is_delivered',
        'is_cancel',
        'cancel_description'
    ];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(\App\Models\Admin\User::class,'customer_id','id');
    }
     protected function generateNo()
    {
        $var = '000';

        $order_no = 'HD'.date("ymd").'-'.str_pad(++$var,4,'0',STR_PAD_LEFT);

        while (Order::whereId($order_no)->count() > 0) {
            $order_no = 'HD'.date("ymd").'-'.str_pad(++$var,4,'0',STR_PAD_LEFT);

        }

        return $order_no;
    }

    public function scopeSearch($query,$s)
    {
        return $query->where('order_no', 'like', '%' .$s. '%');
    }
}
