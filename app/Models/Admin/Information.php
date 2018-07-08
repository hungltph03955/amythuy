<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'phone_number'
    ];
    public function scopeSearch($query,$s)
    {
        return $query->where('name', 'like', '%' .$s. '%')
            ->orWhere('email', 'like', '%' .$s. '%');
    }
}
