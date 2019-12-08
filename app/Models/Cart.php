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
    );

    public function productItem()
    {
        return $this->hasOne('App\Models\ProductItem', 'id', 'product_item_id');
    }
}
