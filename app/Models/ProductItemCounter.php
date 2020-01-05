<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItemCounter extends Model
{
    protected $table = 'product_item_counters';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'product_item_id',
    );
}
