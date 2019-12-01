<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail_1',
        'detail_2',
        'image',
        'status'
    );
}
