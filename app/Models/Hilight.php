<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hilight extends Model
{
    use SoftDeletes;
    
    protected $table = 'hilights';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'image',
        'url',
        'status'
    );
}
