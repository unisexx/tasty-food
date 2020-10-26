<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItemPrice extends Model
{
    protected $table = 'product_item_prices';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'product_item_id',
        'title',
        'price',
        'price_vip',
        'weight',
    );
}
