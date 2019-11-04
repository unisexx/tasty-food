<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hilight extends Model
{

    protected $table = 'hilights';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'image',
        'url',
        'status'
    );
}
