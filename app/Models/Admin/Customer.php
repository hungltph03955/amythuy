<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'email',
        'name',
        'address',
        'phone_number',
        'message'
    ];
}
