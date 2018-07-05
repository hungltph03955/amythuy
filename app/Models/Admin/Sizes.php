<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sizes extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'status',
        'author',
        'description',
        'description',
        'status',
        'author'
    ];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%');
    }
}
