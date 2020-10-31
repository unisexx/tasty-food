<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'order_id',
        'product_item_price_id',
        'qty',
        'price',
    );

    public function productItemPrice()
    {
        return $this->belongsTo('App\Models\ProductItemPrice', 'product_item_price_id', 'id');
    }
}
