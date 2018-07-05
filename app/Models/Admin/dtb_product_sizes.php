<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtb_product_sizes extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'product_id',
        'size_id',
        'author',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%');
    }
}
