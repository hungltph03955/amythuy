<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'slug',
        'img',
        'description',
        'status',
        'author'
    ];
    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo(\App\Models\Admin\Categories::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(\App\Models\Admin\Categories::class, 'parent_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(\App\Models\Admin\Products::class, 'category_id', 'id');

    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%');
    }
}
