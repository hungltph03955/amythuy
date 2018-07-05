<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comment()
    {
        return $this->hasMany(\App\Models\Admin\Comment::class, 'admin_id', 'id');
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%' . $s . '%')
            ->orWhere('email', 'like', '%' . $s . '%');
    }

    public function order()
    {
        return $this->hasMany(\App\Models\Admin\Order::class, 'customer_id', 'id');
    }
}
