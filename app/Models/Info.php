<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use SoftDeletes;
    
    protected $table = 'infos';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail',
        'image',
        'status'
    );
}
