<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vdo extends Model
{
    use SoftDeletes;

    protected $table = 'vdos';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'url',
        'status'
    );
}
