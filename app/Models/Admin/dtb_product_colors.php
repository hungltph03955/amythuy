<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtb_product_colors extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'product_id',
        'color_id',
        'author',
        'img',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%');
    }
}
