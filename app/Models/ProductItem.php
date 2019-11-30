<?php

namespace App\Models;

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
        'stock',
        'status',
        'price',
        'product_category_id',
    );

    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage')->orderBy('order', 'asc');
    }

    public function productImageLast()
    {
        return $this->hasOne('App\Models\ProductImage')->latest();
    }

    public function productImageFirst()
    {
        return $this->hasOne('App\Models\ProductImage')->oldest();
    }

    public function productCategory()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'product_category_id');
    }
}
