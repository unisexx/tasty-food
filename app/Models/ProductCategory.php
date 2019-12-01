<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use NodeTrait;
    use SoftDeletes;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        '_lft',
        '_rgt',
        'parent_id',
        'image',
        'status'
    ];

    public function productItem()
    {
        return $this->hasMany('App\Models\ProductItem', 'product_category_id', 'id');
    }
}
