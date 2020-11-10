<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_addresses';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'name',
        'address',
        'tumbon',
        'amphoe',
        'province',
        'zipcode',
        'tel',
        'user_id',

    );
}
