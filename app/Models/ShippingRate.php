<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    protected $table = 'shipping_rates';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'start_weight',
        'end_weight',
        'cost',
    );
}
