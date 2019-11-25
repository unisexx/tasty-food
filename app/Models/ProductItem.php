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
    );
}
