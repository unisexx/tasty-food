<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'order_id',
        'product_item_id',
        'qty',
        'price',
    );

    public function productItem()
    {
        return $this->hasOne('App\Models\ProductItem', 'id', 'product_item_id');
    }
}
