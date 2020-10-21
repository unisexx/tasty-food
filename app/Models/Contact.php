<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'address',
        'email',
        'tel',
        'facebook',
        'twitter',
        'line',
        'map',
    );
}
