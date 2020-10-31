<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'product_item_id',
        'qty',
        'session_id',
        'user_id',
        'product_item_price_id',
    );

    public function productItemPrice()
    {
        return $this->belongsTo('App\Models\ProductItemPrice', 'product_item_price_id', 'id');
    }
}
