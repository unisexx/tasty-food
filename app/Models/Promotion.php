<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    protected $table = 'promotions';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail',
        'image',
        'product_item_id',
        'status',
    );

    public function productItem()
    {
        return $this->hasOne('App\Models\ProductItem', 'id', 'product_item_id');
    }
}
