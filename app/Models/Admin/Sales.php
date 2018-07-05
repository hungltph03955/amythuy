<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'product_id',
        'sale_price',
        'description',
        'start_date',
        'end_date',
    ];
    protected $dates = ['deleted_at'];
    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Products::class, 'product_id', 'id');
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' .$s. '%');
    }
}
