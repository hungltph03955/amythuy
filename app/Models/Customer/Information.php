<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name',
        'email',
        'detail',
    ];
    public function scopeSearch($query,$s)
    {
        return $query->where('name', 'like', '%' .$s. '%')
            ->orWhere('email', 'like', '%' .$s. '%');
    }
}
