<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'user_id',
        'shipping_charge',
        'status',
        'tracking_date',
        'tracking_number',
        'image',
    );

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function confirmPayment()
    {
        return $this->hasMany('App\Models\ConfirmPayment')->orderBy('id', 'desc');
    }
}
