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
        'price_full',
        'price',
        'price_vip',
        'weight',
    );

    public function productItem()
    {
        return $this->belongsTo('App\Models\ProductItem', 'product_item_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product_item) {
            $product_item->cart()->delete();
        });
    }
}
