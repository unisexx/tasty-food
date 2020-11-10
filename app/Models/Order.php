<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    // use SoftDeletes;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'user_id',
        'shipping_charge',
        'status',
        'tracking_date',
        'tracking_number',
        'image',
        'addr_name',
        'addr_address',
        'addr_tumbon',
        'addr_amphoe',
        'addr_province',
        'addr_zipcode',
        'addr_tel',
        'sum_weight',
        'shipping_cost',
        'total_price',

    );

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function confirmPayment()
    {
        return $this->hasMany('App\Models\ConfirmPayment')->orderBy('id', 'desc');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($order) {
            $order->orderDetail()->delete();
        });
    }
}
