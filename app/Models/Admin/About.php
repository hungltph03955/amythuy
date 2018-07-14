<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'author',
        'description',
        'status',
        'author',
        'img'
    ];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%');
    }
}
