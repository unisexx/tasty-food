<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;
    public function isAdmin()
    {
        return $this->is_admin === self::ADMIN_TYPE;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'tel',
        'address',
        'is_vip',
        'sell_license',
        'pro_license',
        'shop_name',
        'shop_license',
        'shop_address',
        'shop_tumbon',
        'shop_amphoe',
        'shop_province',
        'shop_zipcode',
        'shop_tel',
        'is_vip',
        'type',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orderSuccess()
    {
        return $this->hasMany('App\Models\Order')->where('status', 'จัดส่งสินค้าแล้ว');
    }
}
