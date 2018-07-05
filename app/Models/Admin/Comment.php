<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'customer_id',
        'admin_id',
        'product_id',
        'content',
    ];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(\App\User::class, 'customer_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin\Admin::class, 'admin_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Products::class,'product_id','id');
    }
}
