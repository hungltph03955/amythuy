<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'description',
        'quantity',
        'price',
        'status',
        'slug',
        'author',
        'img'
    ];
    protected $orderBy = 'property';
    protected $dates = ['deleted_at'];
//    public function shop()
//    {
//        return $this->belongsTo(\App\Models\Admin\Shops::class, 'shop_id', 'id');
//    }
    public function sales()
    {
        return $this->hasMany(\App\Models\Admin\Sales::class, 'product_id', 'id');
    }


    public function category()
    {
        return $this->belongsToMany(Categories::class, 'dtb_product_categories', 'product_id', 'category_id', 'id', 'id');
    }

    public function photo()
    {
        return $this->hasMany(\App\Models\Admin\Images::class, 'product_id', 'id');
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%')
            ->orWhere('price', 'like', '%' . $s . '%');
    }

    public function rating()
    {
        return $this->hasMany(\App\Models\Admin\Rating::class, 'product_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(\App\Models\Admin\Comment::class, 'product_id', 'id');
    }

    public function scopeSortable($query, $params)
    {

        $array = [
            'price_asc', 'price_desc',
            'date_asc', 'date_desc'
        ];

        $type_sort = $params;

        if (empty($type_sort) || !in_array($type_sort, $array)) {
            return response()->json([
                'message' => "Invalid data"
            ]);
        }
        switch ($type_sort) {
            case "price_desc":
                return $query->orderBy('price', 'DESC');
                break;
            case "date_desc":
                return $query->orderBy('created_at', 'ASC');
                break;
            case "date_asc":
                return $query->orderBy('created_at', 'DESC');
                break;
            default:
                return $query->orderBy('price', 'ASC');
                break;
        }

    }

    public function views()
    {

    }


}
