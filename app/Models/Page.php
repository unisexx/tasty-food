<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail',
        'module',
    );
}