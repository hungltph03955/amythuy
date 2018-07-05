<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use SoftDeletes;
//    protected $table = ['images'];
    protected $fillable = [
        'product_id',
        'name'
    ];
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Admin\Products::class,'product_id','id');
    }
}
