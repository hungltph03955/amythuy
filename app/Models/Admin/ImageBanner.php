<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageBanner extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'img',
        'author',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];

}
