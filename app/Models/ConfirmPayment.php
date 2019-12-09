<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfirmPayment extends Model
{
    use SoftDeletes;

    protected $table = 'confirm_payments';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'payment_date',
        'payment_hour',
        'payment_minute',
        'payment_amount',
        'payment_attach',
        'name',
        'email',
        'tel',
        'order_id',
        'description',
    );
}
