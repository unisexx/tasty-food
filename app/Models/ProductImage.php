<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'product_item_id',
        'name',
        'order',
    );
}
