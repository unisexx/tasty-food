<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledge extends Model
{
    use SoftDeletes;
    
    protected $table = 'knowledges';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail',
        'image',
        'status'
    );
}
