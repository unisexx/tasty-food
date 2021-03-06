<?php

namespace App\Models;

use App\Scopes\VipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductItem extends Model
{
    use SoftDeletes;

    protected $table = 'product_items';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'brand',
        'name',
        'description',
        'status',
        'product_category_id',
        'view_count',
        'is_new',
        'is_bestseller',
        'is_vip_view_only',
    );

    public function productItemPrice()
    {
        return $this->hasMany('App\Models\ProductItemPrice', 'product_item_id', 'id');
    }

    public function productItemPriceFirst()
    {
        return $this->hasOne('App\Models\ProductItemPrice')->orderBy('price', 'asc');
    }

    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage')->orderBy('order', 'asc');
    }

    public function productImageFirst()
    {
        return $this->hasOne('App\Models\ProductImage')->orderBy('order', 'asc');
    }

    public function productImageLast()
    {
        return $this->hasOne('App\Models\ProductImage')->orderBy('order', 'desc');
    }

    public function productCategory()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'product_category_id');
    }

    public function promotion()
    {
        return $this->hasOne('App\Models\Promotion', 'product_item_id', 'id')->where('status', 1);
    }

    public function productItemCounter()
    {
        return $this->hasMany('App\Models\ProductItemCounter');
    }

    public function carts()
    {
        return $this->hasManyThrough('App\Models\Cart', 'App\Models\ProductItemPrice');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product_item) {
            $product_item->carts()->delete();
            $product_item->productItemPrice()->delete();
        });
        static::addGlobalScope(new VipScope);
    }
}
